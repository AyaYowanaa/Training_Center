<?php

namespace App\Http\Controllers\Admin\Training_Center;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\training_center\Instructors_Courses;
use App\Models\training_center\Trainer;
use App\Models\training_center\TrainingCourse;
use App\Models\setting\Expenses;
use App\Http\Requests\training_center\Instructors_Courses\StoreRequest;
use App\Http\Requests\training_center\Instructors_Courses\UpdateRequest;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class Instructors_CoursesController extends Controller
{

    public function index(Request $request)
    {

        if ($request->ajax()) {
            $allData = Instructors_Courses::select('*');
            return Datatables::of($allData)

                ->editColumn('courses_id', function ($row) {
                    return $row->coursesData?->title ?? '—';
                })
                ->editColumn('trainer_id', function ($row) {
                    return $row->trainerData?->name ?? '—';
                })
                ->addColumn('action', function ($row) {

                    return ' <a class="btn btn-icon btn-active-light-warning w-30px h-30px me-3 "
                                   href="' . route('admin.Settings.Instructors_Courses.edit', $row->id) . '"
                               title="' . trans('forms.edite_btn') . '">
                                    <i class="ki-duotone ki-notepad-edit fs-1"><span class="path1"></span><span class="path2"></span></i>
                                </a>
                                <a class="btn btn-icon btn-active-light-danger w-30px h-30px"
                                 href="' . route('admin.Settings.Instructors_Courses.destroy', $row->id) . '" data-kt-table-delete="delete_row"
                                           title="' . trans('forms.delete_btn') . '">
                                    <i class="ki-duotone ki-trash fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                                </a>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('dashbord.admin.Training_Center.Instructors_Courses.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {    $data['one_data']= new Instructors_Courses();
         $data['courses']= TrainingCourse::all();
         $data['trainers'] = Trainer::all();
        return view('dashbord.admin.Training_Center.Instructors_Courses.create'
        , $data);

    }
    public function show_load($id)
    {
        $data['one_data'] = Instructors_Courses::findOrFail($id);
        $data['courses'] = TrainingCourse::all();
        return view('dashbord.admin.Training_Center.Instructors_Courses.load_details', $data);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {

        try {

            $insert_data = $request->all();
            $inserted_data = Instructors_Courses::create($insert_data);
            $insert_id = $inserted_data->id;
            toastr()->addSuccess(trans('forms.success'));
            return redirect()->route('admin.Settings.Instructors_Courses.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    public function edit($id)
    {
        $data['one_data'] = Instructors_Courses::findOrFail($id);
        $data['courses']= TrainingCourse::all();
        $data['trainers'] = Trainer::all();

        return view('dashbord.admin.Training_Center.Instructors_Courses.edit',$data);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, $id)
    {
        try {
            $data = Instructors_Courses::findOrFail($id);
            $update_data = $request->all();
            $data->update($update_data);
            toastr()->addSuccess(trans('forms.success'));
            return redirect()->route('admin.Settings.Instructors_Courses.index');
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

            $one_data = Instructors_Courses::find($id);

            $one_data->delete();
            toastr()->error(trans('forms.Delete'));
            return response()->json(['message' => trans('forms.Delete')], 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);

        }
    }


}
