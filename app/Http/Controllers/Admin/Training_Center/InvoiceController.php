<?php

namespace App\Http\Controllers\Admin\Training_Center;

use App\Http\Controllers\Controller;
use App\Http\Requests\training_center\Invoices\StoreRequest;
use App\Http\Requests\training_center\Invoices\UpdateRequest;
use App\Models\training_center\Invoice_student;
use App\Models\training_center\Students;
use App\Models\training_center\TrainingCourse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class InvoiceController extends Controller
{

    public function index(Request $request)
    {

        if ($request->ajax()) {
            $allData = Invoice_student::select('*');
            return Datatables::of($allData)
                ->editColumn('course_id', function ($row) {
                    return $row->coursesData?->title ?? '—';
                })
                ->editColumn('student_id', function ($row) {
                    return $row->studentData?->name ?? '—';
                })
                ->addColumn('action', function ($row) {

                    return ' <a class="btn btn-icon btn-active-light-warning w-30px h-30px me-3 "
                                   href="' .  route('admin.TrainingCenter.Invoice.edit', $row->id) . '"
                               title="' . trans('forms.edite_btn') . '">
                                    <i class="ki-duotone ki-notepad-edit fs-1"><span class="path1"></span><span class="path2"></span></i>
                                </a>
                                <a class="btn btn-icon btn-active-light-info w-30px h-30px me-3 "
                                href="javascript:void(0)" data-kt-table-details="details_row" data-url="' . route('admin.TrainingCenter.Invoice.load_details', $row->id) . '"
                                          data-bs-toggle="modal" data-bs-target="#kt_modal_1"  title="' . trans('forms.details') . '">
                                     <i class="ki-duotone ki-information fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                 </a>
                                <a class="btn btn-icon btn-active-light-danger w-30px h-30px"
                                 href="' . route('admin.TrainingCenter.Invoice.destroy', $row->id) . '" data-kt-table-delete="delete_row"
                                           title="' . trans('forms.delete_btn') . '">
                                    <i class="ki-duotone ki-trash fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                                </a>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('dashbord.admin.Training_Center.Invoice_student.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['one_data'] = new Invoice_student();
        // $data['courses']= TrainingCourse::all();
        //  $data['students'] = Students::all();
//        $data['students'] = Students::whereHas('registeredCourses')->get();
        return view('dashbord.admin.Training_Center.Invoice_student.create'
            , $data);

    }

    public function show_load($id)
    {
        $data['one_data'] = Invoice_student::findOrFail($id);
        //   $data['courses'] = TrainingCourse::all();
        $data['students'] = Students::all();
        return view('dashbord.admin.Training_Center.Invoice_student.load_details', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {

        try {

            $insert_data = $request->all();
            $inserted_data = Invoice_student::create($insert_data);
            $insert_id = $inserted_data->id;
            toastr()->addSuccess(trans('forms.success'));
            return redirect()->route('admin.TrainingCenter.Invoice.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    public function edit($id)
    {
        $data['one_data'] = Invoice_student::findOrFail($id);
        $data['students'] = Students::whereHas('registeredCourses')->get();
        // $data['courses'] = TrainingCourse::all();
        return view('dashbord.admin.Training_Center.Invoice_student.edit', $data);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, $id)
    {
        try {
            $data = Invoice_student::findOrFail($id);
            $update_data = $request->all();
            $data->update($update_data);
            toastr()->addSuccess(trans('forms.success'));
            return redirect()->route('admin.TrainingCenter.Invoice.index');
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

            $one_data = Invoice_student::find($id);

            $one_data->delete();
            toastr()->error(trans('forms.Delete'));
            return response()->json(['message' => trans('forms.Delete')], 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);

        }
    }

    public function getStudentCourses($id)
    {

        /*  $student = Students::with('registeredCourses')->findOrFail($id);
         return response()->json($student->registeredCourses);
        */
        $student = Students::findOrFail($id);
        return response()->json($student->registeredCourses()->get());
    }

    function getStudentFees(Request $request)
    {

        $student_id = $request->student_id;
        $course_id = $request->course_id;
        $courseFees = TrainingCourse::find($course_id)->fee;
        $paid = Invoice_student::where(['student_id' => $student_id, 'course_id' => $course_id])->sum('amount');
        $remain = $courseFees - $paid;

        return response()->json(['remain' => $remain, 'courseFees' => $courseFees, 'paid' => $paid]);


    }

}
