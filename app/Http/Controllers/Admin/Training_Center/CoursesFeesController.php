<?php

namespace App\Http\Controllers\Admin\Training_Center;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\training_center\CourseFees;
use App\Models\training_center\TrainingCourse;
use App\Models\setting\Expenses;
/* use App\Http\Requests\training_center\CourseFees\StoreRequest;
use App\Http\Requests\training_center\CourseFees\UpdateRequest; */

use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class CoursesFeesController extends Controller
{

    public function index(Request $request)
    {

        if ($request->ajax()) {
            $allData = CourseFees::select('*');
            return Datatables::of($allData)

                ->editColumn('courses_id', function ($row) {
                    return $row->coursesData?->title ?? '—';
                })
                ->editColumn('expenses_id', function ($row) {
                    return $row->expensesData?->name ?? '—';
                })
                ->addColumn('action', function ($row) {

                    return ' <a class="btn btn-icon btn-active-light-warning w-30px h-30px me-3 "
                                   href="' . route('admin.Settings.CourseCosts.edit', $row->id) . '"
                               title="' . trans('forms.edite_btn') . '">
                                    <i class="ki-duotone ki-notepad-edit fs-1"><span class="path1"></span><span class="path2"></span></i>
                                </a>
                                <a class="btn btn-icon btn-active-light-info w-30px h-30px me-3 "
                                href="javascript:void(0)" data-kt-table-details="details_row" data-url="' . route('admin.Settings.CourseCosts.load_details', $row->id) . '"
                                          data-bs-toggle="modal" data-bs-target="#kt_modal_1"  title="' . trans('forms.details') . '">
                                     <i class="ki-duotone ki-information fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                 </a>
                                <a class="btn btn-icon btn-active-light-danger w-30px h-30px"
                                 href="' . route('admin.Settings.CourseCosts.destroy', $row->id) . '" data-kt-table-delete="delete_row"
                                           title="' . trans('forms.delete_btn') . '">
                                    <i class="ki-duotone ki-trash fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                                </a>';

                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('dashbord.admin.Training_Center.CourseFees.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {    $data['one_data']= new CourseFees();
         $data['courses']= TrainingCourse::all();
         $data['expenses']= Expenses::all();
        return view('dashbord.admin.Training_Center.CourseFees.create'
        , $data);

    }
    public function show_load($id)
    {
        $data['one_data'] = CourseFees::findOrFail($id);
        $data['expenses'] = Expenses::all();
        $data['courses'] = TrainingCourse::all();
        return view('dashbord.admin.Training_Center.CourseFees.load_details', $data);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        try {
          //  dd($request->input('courses_id'));

            $insert_data = $request->all();
            $inserted_data = CourseFees::create($insert_data);
            $insert_id = $inserted_data->id;
            toastr()->addSuccess(trans('forms.success'));
            return redirect()->route('admin.Settings.CourseCosts.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    public function edit($id)
    {
        $data['one_data'] = CourseFees::findOrFail($id);
        $data['courses']= TrainingCourse::all();
        $data['expenses']= Expenses::all();
        return view('dashbord.admin.Training_Center.CourseFees.edit',$data);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $data = CourseFees::findOrFail($id);
            $update_data = $request->all();
            $data->update($update_data);
            toastr()->addSuccess(trans('forms.success'));
            return redirect()->route('admin.Settings.CourseCosts.index');
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

            $one_data = CourseFees::find($id);

            $one_data->delete();
            toastr()->error(trans('forms.Delete'));
            return response()->json(['message' => trans('forms.Delete')], 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);

        }
    }


}
