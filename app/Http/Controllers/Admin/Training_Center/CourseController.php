<?php

namespace App\Http\Controllers\Admin\Training_Center;


use App\Http\Controllers\Controller;

use App\Http\Requests\training_center\course\StoreRequest;
use App\Http\Requests\training_center\course\UpdateRequest;
use App\Models\Finance\courses_type;
use App\Models\training_center\Course;
use Exception;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\DataTables;

class CourseController extends Controller
{

    public function index(Request $request)
    {

        if ($request->ajax()) {
            $allData = Course::select('*');
            return Datatables::of($allData)
                ->editColumn('name', function ($row) {
                    return $row->name;
                })->editColumn('parent', function ($row) {
                    return optional($row->parent_data)->name;
                })
                ->filterColumn('parent', function ($query, $keyword) {
                    $query->whereHas('parent_data', function ($q) use ($keyword) {
                        $q->where('name', 'like', "%{$keyword}%");
                    });
                })
                ->addColumn('action', function ($row) {
                    return '<a href="#" class="btn btn-sm btn-light btn-active-light-primary"
                   data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"> ' . trans('forms.action') . '
                   <span class="svg-icon svg-icon-5 m-0">
                       <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                       xmlns="http://www.w3.org/2000/svg">
                           <path d="M11.4343 12.7344L7.25 8.55005C6.83579
                           8.13583 6.16421 8.13584 5.75 8.55005C5.33579
                           8.96426 5.33579 9.63583 5.75 10.05L11.2929
                           15.5929C11.6834 15.9835 12.3166 15.9835
                           12.7071 15.5929L18.25 10.05C18.6642 9.63584
                            18.6642 8.96426 18.25 8.55005C17.8358 8.13584
                            17.1642 8.13584 16.75 8.55005L12.5657
                             12.7344C12.2533 13.0468 11.7467 13.0468
                             11.4343 12.7344Z" fill="currentColor" />
                       </svg>
                   </span>
                 </a>
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                        <div class="menu-item px-3">
                             <a href="' . route('admin.Settings.course.edit', $row->id) . '"
                               name="' . trans('forms.edite_btn') . '" class="menu-link px-3"
                               >' . trans('forms.edite_btn') . '</a>
                        </div>


                        <div class="menu-item px-3">
                                <a href="' . route('admin.Settings.course.destroy', $row->id) . '" data-kt-table-delete="delete_row"
                                           name="' . trans('forms.delete_btn') . '" class="menu-link px-3"
                                           >' . trans('forms.delete_btn') . '</a>
                        </div>
                  </div>



                   </div>';
                })
                ->rawColumns(['action', 'status'])
                ->make(true);
        }

        return view('dashbord.admin.Training_Center.course.index');
    }

    public function tree()
    {
        $courses = Course::with('children')->get()->toTree();
        $categoryTree = $this->buildTree($courses);

        return view('dashbord.admin.Training_Center.course.tree', compact('courses', 'categoryTree'));
    }

    public function load_roots()
    {
        $courses = Course::whereIsRoot()->get();
        return response()->json($this->formatcourses($courses));
    }

    public function load_child(Request $request)
    {
        $parent = Course::find($request->id);
        if ($parent) {
            $children = $parent->children()->get();
            return response()->json($this->formatcourses($children));
        }
        return response()->json([]);
    }

    private function formatcourses($courses)
    {
        return $courses->map(function ($category) {
            if ($category->children()->exists()) {
                $icon = 'ki-solid ki-add-folder text-success';
            } else {
                $icon = 'ki-solid ki-minus-folder text-waring';

            }
            return [
                'id' => $category->id,
                'text' => $category->getTranslation('name', 'en'), // Assuming English as default language for display
                'children' => $category->children()->exists(),// Indicate if the node has children

            ];
        });
    }

    private function buildTree($nodes)
    {
        $tree = [];
        foreach ($nodes as $node) {
            $tree[] = [
                'id' => $node->id,
                'text' => $node->getTranslation('name', 'en'), // Assuming English as default language for display
                'children' => $this->buildTree($node->children)
            ];
        }
        return $tree;
    }

    public function create()
    {
        $courses = Course::all();
        return view('dashbord.admin.Training_Center.course.create', compact('courses'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->all();

        $parent = Course::find(optional($data)['parent_id']);
        if ($parent) {
            $parent->children()->create($data);
        } else {
            Course::create($data);
        }

        return redirect()->route('admin.Settings.course.index');
    }

    public function show(Course $category)
    {
        return view('courses.show', compact('category'));
    }

    public function edit(Request $request, $id)
    {

        $courses = Course::all();
//        $courses_type = courses_type::all();

        $one_data = Course::find($id);

        return view('dashbord.admin.Training_Center.course.edit', compact('one_data', 'courses'));
    }

    public function load_edit(Request $request)
    {
//        dd($request);
//        $courses = Course::all();
        $category = Course::find($request->id);

//        return view('courses.edit', compact('category', 'courses'));
        return response()->json($category);

    }

    public function update(UpdateRequest $request)
    {
        $data = $request->all();

        $course = Course::find($data['id']);
        $course->update($data);

        if ($request->input('parent_id')) {
            $parent = Course::find($request->input('parent_id'));
            $course->appendToNode($parent)->save();
        } else {
            $course->saveAsRoot();
        }

        return redirect()->route('admin.Settings.course.index');
    }

    public function destroy(Request $request, $id)
    {
        try {

            $one_data = Course::find($id);

            $one_data->delete();
            toastr()->error(trans('forms.Delete'));

//            return redirect()->route('admin.Unite.index');
            /*            return redirect()->back();*/
            return response()->json(['message' => trans('forms.Delete')], 200);
        } catch (Exception $e) {
            /*            return redirect()->back()->withErrors(['error' => $e->getMessage()]);*/
            return response()->json(['error' => $e->getMessage()], 500);

        }
    }



}

