<?php

namespace App\Http\Controllers\Admin\Training_Center;


use App\Http\Controllers\Controller;

use App\Http\Requests\training_center\course\StoreRequest;
use App\Http\Requests\training_center\course\UpdateRequest;
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
                    return ' <a class="btn btn-icon btn-active-light-warning w-30px h-30px me-3"
                                   href="' . route('admin.Settings.course.edit', $row->id) . '"
                               title="' . trans('forms.edite_btn') . '">
                                    <i class="ki-duotone ki-notepad-edit"><span class="path1"></span><span class="path2"></span></i>
                                </a>

                                <a class="btn btn-icon btn-active-light-danger w-30px h-30px" href="' . route('admin.Settings.course.destroy', $row->id) . '" data-kt-table-delete="delete_row"
                                           title="' . trans('forms.delete_btn') . '">
                                    <i class="ki-duotone ki-trash fs-3"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                                </a>';


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

