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
                   return ' <a class="btn btn-icon btn-active-light-warning w-30px h-30px me-3 "
                                   href="' . route('admin.Settings.training_courses.edit', $row->id) . '"
                               title="' . trans('forms.edite_btn') . '">
                                    <i class="ki-duotone ki-notepad-edit fs-1"><span class="path1"></span><span class="path2"></span></i>
                                </a>
                                <a class="btn btn-icon btn-active-light-info w-30px h-30px me-3 "
                                href="javascript:void(0)" data-kt-table-details="details_row" data-url="' . route('admin.Settings.training_courses.load_details', $row->id) . '"
                                          data-bs-toggle="modal" data-bs-target="#kt_modal_1"  title="' . trans('forms.details') . '">
                                     <i class="ki-duotone ki-information fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                 </a>
                                <a class="btn btn-icon btn-active-light-danger w-30px h-30px"
                                 href="' . route('admin.Settings.training_courses.destroy', $row->id) . '" data-kt-table-delete="delete_row"
                                           title="' . trans('forms.delete_btn') . '">
                                    <i class="ki-duotone ki-trash fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                                </a>';


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
        $data['location_id'] = MainSetting::where('type_id_fk', '6')->get();  //::where('type', '105')->get();
        $data['courses'] = Course::all();

        return view('dashbord.admin.Training_Center.training_courses.createSteper',$data);

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
