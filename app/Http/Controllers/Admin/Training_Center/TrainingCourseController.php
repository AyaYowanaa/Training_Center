<?php

namespace App\Http\Controllers\Admin\Training_Center;

use App\Http\Controllers\Controller;
 use App\Http\Requests\training_center\training_courses\StoreRequest;
use App\Http\Requests\training_center\training_courses\UpdateRequest;
use App\Models\training_center\TrainingCourse;
use App\Models\setting\MainSetting;
use App\Models\training_center\Course;
use App\Traits\ResponseApi;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TrainingCourseController extends Controller
{
    use ResponseApi;

   // protected $upload_folder = 'Training_Center/training_courses';

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $allData = TrainingCourse::select('*');
            return Datatables::of($allData)
                ->editColumn('title', function ($row) {
                    return $row->title;
                })
                ->editColumn('courses_id', function ($row) {
                    return $row->coursesData?->name ?? '—';
                })
               /*  ->editColumn('location_id', function ($row) {
                    return $row->locationData?->name ?? '—';
                }) */
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
                             <a href="' . route('admin.Settings.training_courses.edit', $row->id) . '"
                               title="' . trans('forms.edite_btn') . '" class="menu-link px-3"
                               >' . trans('forms.edite_btn') . '</a>
                        </div>
                   		 <div class="menu-item px-3">
                                <a href="javascript:void(0)" data-kt-table-details="details_row" data-url="' . route('admin.Settings.training_courses.load_details', $row->id) . '"
                                           address="' . trans('forms.details') . '" class="menu-link px-3"
                                         data-bs-toggle="modal" data-bs-target="#kt_modal_1"  >' . trans('forms.details') . '</a>
                        </div>
                        <div class="menu-item px-3">
                                <a href="' . route('admin.Settings.training_courses.destroy', $row->id) . '" data-kt-table-delete="delete_row"
                                           title="' . trans('forms.delete_btn') . '" class="menu-link px-3"
                                           >' . trans('forms.delete_btn') . '</a>
                        </div>
                  </div>



                   </div>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('dashbord.admin.Training_Center.training_courses.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['location_id'] = MainSetting::all();  //::where('type', '105')->get();
        $data['courses'] = Course::all();

        return view('dashbord.admin.Training_Center.training_courses.create',$data);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        try {

            $insert_data = $request->all();
            $insert_data['title'] = ['en' => $request->title_en, 'ar' => $request->title_ar];
            $insert_data['details'] = ['en' => $request->details_en, 'ar' => $request->details_ar];
           // $update_data['location'] = ['en' => $request->location_en, 'ar' => $request->location_ar];

            $inserted_data = TrainingCourse::create($insert_data);
            $insert_id = $inserted_data->id;
            toastr()->addSuccess(trans('forms.success'));
            return redirect()->route('admin.Settings.training_courses.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
     //  $one_data = TrainingCourse::with('images')->findOrFail($id);

     //   $data['one_data'] = $one_data;
      //  return view('dashbord.admin.Training_Center.training_courses.details', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {   
       $data['one_data'] = TrainingCourse::findOrFail($id);
       $data['location_id'] = MainSetting::all();  //::where('type', '105')->get();
       $data['courses'] = Course::all();

        return view('dashbord.admin.Training_Center.training_courses.edit', $data);

    }
    public function show_load($id)
    {
        $data['one_data'] = TrainingCourse::findOrFail($id);

        return view('dashbord.admin.Training_Center.training_courses.load_details', $data);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, $id)
    {
        try {
            $data = TrainingCourse::find($request->id);
            $update_data = $request->all();
            $update_data['title'] = ['en' => $request->title_en, 'ar' => $request->title_ar];
            $update_data['details'] = ['en' => $request->details_en, 'ar' => $request->details_ar];

            $data->update($update_data);
            $insert_id = $request->id;
            toastr()->addSuccess(trans('forms.success'));
            return redirect()->route('admin.Settings.training_courses.index');
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

            $one_data = TrainingCourse::find($id);

            $one_data->delete();
            toastr()->error(trans('forms.Delete'));
            return response()->json(['message' => trans('forms.Delete')], 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);

        }
    }

}
