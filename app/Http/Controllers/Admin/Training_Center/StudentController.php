<?php

namespace App\Http\Controllers\Admin\Training_Center;

use App\Http\Controllers\Controller;
use App\Http\Requests\training_center\Students\StoreRequest;
use App\Http\Requests\training_center\Students\UpdateRequest;
use App\Models\training_center\Students;
use App\Models\training_center\TrainingCourse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{

    public function index(Request $request)
    {

        if ($request->ajax()) {
            $allData = Students::select('*');
            return Datatables::of($allData)
                ->editColumn('name', function ($row) {
                    return $row->name;
                })
                ->editColumn('courses_id', function ($row) {
                    return $row->coursesData?->title ?? '—';
                })
                ->addColumn('action', function ($row) {

                    return ' <a class="btn btn-icon btn-active-light-warning w-30px h-30px me-3"
                                   href="' . route('admin.TrainingCenter.Student.edit', $row->id) . '"
                               title="' . trans('forms.edite_btn') . '">
                                    <i class="ki-duotone ki-notepad-edit  fs-1"><span class="path1"></span><span class="path2"></span></i>
                                </a>
                                <a class="btn btn-icon btn-active-light-info w-30px h-30px me-3" href="' . route('admin.TrainingCenter.Student.show', $row->id) . '"
                                    title="' . trans('forms.details') . '">
                                     <i class="ki-duotone ki-information  fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                 </a>
                                <a class="btn btn-icon btn-active-light-danger w-30px h-30px" href="' . route('admin.TrainingCenter.Student.destroy', $row->id) . '" data-kt-table-delete="delete_row"
                                           title="' . trans('forms.delete_btn') . '">
                                    <i class="ki-duotone ki-trash fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                                </a>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('dashbord.admin.Training_Center.Students.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['one_data'] = new Students();
        $data['courses'] = TrainingCourse::all();
        // $courses=Course::all();
        // $data['grades']= Grades::all();
        return view('dashbord.admin.Training_Center.Students.create'
            , $data);

    }

    public function show_load($id)
    {
        $data['one_data'] = Students::findOrFail($id);

        return view('dashbord.admin.Training_Center.Students.load_details', $data);
    }

    public function show($id)
    {
        $data['one_data'] = Students::with('Courses.locationData', 'Courses.coursesData', 'invoice.coursesData', 'attendances.coursesData')->findOrFail($id);
//        dd($data['one_data']);
        return view('dashbord.admin.Training_Center.Students.details', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {

        try {
            //  dd($request->input('courses_id'));
        //user_name->phone , pass->static 123456
            $insert_data = $request->all();
            $insert_data['user_name'] = $request->phone;
            $insert_data['password'] = Hash::make('123456');
            $insert_data['name'] = ['en' => $request->name_en, 'ar' => $request->name_ar];
            $inserted_data = Students::create($insert_data);
            $insert_id = $inserted_data->id;
            toastr()->addSuccess(trans('forms.success'));
            return redirect()->route('admin.TrainingCenter.Student.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    public function edit($id)
    {
        $data['one_data'] = Students::findOrFail($id);
        $data['courses'] = TrainingCourse::all();
        return view('dashbord.admin.Training_Center.Students.edit', $data);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, $id)
    {
        try {
            $data = Students::findOrFail($id);
            $update_data = $request->all();
            $update_data['name'] = ['en' => $request->name_en, 'ar' => $request->name_ar];
            $data->update($update_data);
            toastr()->addSuccess(trans('forms.success'));
            return redirect()->route('admin.TrainingCenter.Student.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {


        try {

            $one_data = Students::find($id);

            $one_data->delete();
            toastr()->error(trans('forms.Delete'));
            return response()->json(['message' => trans('forms.Delete')], 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);

        }
    }


}
