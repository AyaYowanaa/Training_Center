<?php

namespace App\Http\Controllers\Admin\Training_Center;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\training_center\Students;
use App\Models\training_center\TrainingCourse;
use App\Models\training_center\Invoice_student;
use  App\Http\Requests\training_center\Invoices\StoreRequest;
use  App\Http\Requests\training_center\Invoices\UpdateRequest;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class InvoiceController extends Controller
{
  
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $allData = Invoice_student::select('*');
            return Datatables::of($allData)
                
                ->editColumn('courses_id', function ($row) {
                    return $row->coursesData?->title ?? '—';
                })
                ->editColumn('student_id', function ($row) {
                    return $row->studentData?->name ?? '—';
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
                             <a href="' . route('admin.TrainingCenter.Invoice.edit', $row->id) . '"
                               address="' . trans('forms.edite_btn') . '" class="menu-link px-3"
                               >' . trans('forms.edite_btn') . '</a>
                        </div>
                   		
                       
                        <div class="menu-item px-3">
                                <a href="' . route('admin.TrainingCenter.Invoice.destroy', $row->id) . '" data-kt-table-delete="delete_row"
                                           address="' . trans('forms.delete_btn') . '" class="menu-link px-3"
                                           >' . trans('forms.delete_btn') . '</a>
                        </div>
                  </div>



                   </div>';
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
    {    $data['one_data']= new Invoice_student();
        // $data['courses']= TrainingCourse::all();
       //  $data['students'] = Students::all();
       $data['students']  = Students::whereHas('registeredCourses')->get();
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
        return view('dashbord.admin.Training_Center.Invoice_student.edit',$data);

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
     return response()->json($student->registeredCourses()->get());}


}
