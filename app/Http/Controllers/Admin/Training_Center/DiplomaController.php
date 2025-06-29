<?php

namespace App\Http\Controllers\Admin\Training_Center;

use App\Http\Controllers\Controller;
  use App\Http\Requests\training_center\Diploma\StoreRequest;
use App\Http\Requests\training_center\Diploma\UpdateRequest; 
use App\Models\training_center\Diploma;
use App\Models\training_center\Diploma_levels;
use App\Traits\ResponseApi;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DiplomaController extends Controller
{
    use ResponseApi;

   // protected $upload_folder = 'Training_Center/training_courses';

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $allData = Diploma::select('*');
            return Datatables::of($allData)
                ->editColumn('name', function ($row) {
                    return $row->name;
                })
                     ->addColumn('action', function ($row) {

                    return ' <a class="btn btn-icon btn-active-light-warning w-30px h-30px me-3 "
                                   href="' .  route('admin.TrainingCenter.Diploma.edit', $row->id) . '"
                               title="' . trans('forms.edite_btn') . '">
                                    <i class="ki-duotone ki-notepad-edit fs-1"><span class="path1"></span><span class="path2"></span></i>
                                </a>

                                <a class="btn btn-icon btn-active-light-info  w-30px h-30px me-3 "
                                   href="' . route('admin.TrainingCenter.Diploma.levels', $row->id) . '" title="' . trans('diploma.levels') . '">
                            <i class="ki-duotone ki-abstract-14 fs-1">
                                 <span class="path1"></span>
                                <span class="path2"></span>
                            </i>                                </a>
                              <!--  <a class="btn btn-icon btn-active-light-info w-30px h-30px me-3 "
                                href="javascript:void(0)" data-kt-table-details="details_row" data-url="' . route('admin.TrainingCenter.Diploma.show', $row->id) . '"
                                          data-bs-toggle="modal" data-bs-target="#kt_modal_1"  title="' . trans('forms.details') . '">
                                     <i class="ki-duotone ki-information fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                 </a>-->
                                <a class="btn btn-icon btn-active-light-danger w-30px h-30px"
                                 href="' . route('admin.TrainingCenter.Diploma.destroy', $row->id) . '" data-kt-table-delete="delete_row"
                                           title="' . trans('forms.delete_btn') . '">
                                    <i class="ki-duotone ki-trash fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                                </a>';
              
                 

                
                })
              
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('dashbord.admin.Training_Center.Diploma.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashbord.admin.Training_Center.Diploma.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        try {

            $insert_data = $request->all();
            $insert_data['name'] = ['en' => $request->name_en, 'ar' => $request->name_ar];
            $insert_data['description'] = ['en' => $request->description_en, 'ar' => $request->description_ar];
            $inserted_data = Diploma::create($insert_data);
            $insert_id = $inserted_data->id;
            toastr()->addSuccess(trans('forms.success'));
            return redirect()->route('admin.TrainingCenter.Diploma.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
       $one_data = Diploma::findOrFail($id);

        $data['one_data'] = $one_data;
        return view('dashbord.admin.Training_Center.Diploma.details', $data);
    }

    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
       $data['one_data'] = Diploma::findOrFail($id);
        return view('dashbord.admin.Training_Center.Diploma.edit', $data);

    }
    public function show_load($id)
    {
        $data['one_data'] = Diploma::findOrFail($id);

        return view('dashbord.admin.Training_Center.Diploma.load_details', $data);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, $id)
    {
        try {
            $data = Diploma::find($request->id);
            $update_data = $request->all();
            $update_data['name'] = ['en' => $request->name_en, 'ar' => $request->name_ar];
            $update_data['description'] = ['en' => $request->description_en, 'ar' => $request->description_ar];

            $data->update($update_data);
            $insert_id = $request->id;
            toastr()->addSuccess(trans('forms.success'));
            return redirect()->route('admin.TrainingCenter.Diploma.index');
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

            $one_data = Diploma::find($id);

            $one_data->delete();
            toastr()->error(trans('forms.Delete'));
            return response()->json(['message' => trans('forms.Delete')], 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);

        }
    }


    
/************************************* Levels ************************************** */

     public function levels($id)
    {
        $data['one_data'] = Diploma::findOrFail($id);
        return view('dashbord.admin.Training_Center.Diploma.levels.create', $data);
    }
    
    public function getlevel(Request $request)
    {


        $diploma_id = $request->input('diploma_id');
        $allData = Diploma_levels::select('*')->where('diploma_id', $diploma_id);

        return Datatables::of($allData)
     
           ->addColumn('action', function ($row) {
    $deleteUrl = route('admin.TrainingCenter.Diploma.levels.delete', $row->id);
    return '<a href="' . $deleteUrl . '" class="btn btn-sm btn-icon btn-danger"
        data-kt-table-delete="delete_row">
        <i class="ki-duotone ki-trash-square fs-1 ">
            <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span>
        </i>
    </a>';
})

            ->rawColumns(['action'])
            ->make(true);

    }


    public function addlevel(Request $request)
    {

      $validated = $request->validate([
        'name' => 'required|string',
        'pass_mark' => 'required',
     
      ]);


        try {

            $insert_data = $request->all();
            $inserted_data = Diploma_levels::create($insert_data);
            $insert_id = $inserted_data->id;

            toastr()->addSuccess(trans('forms.success'));
            return redirect()->route('admin.TrainingCenter.Diploma.levels');

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }


    }
  
    public function deletelevel($id)
{
    $question = Diploma_levels::find($id);

    if (!$question) {
        return response()->json(['message' => 'السؤال غير موجود'], 404);
    }

    $question->delete();

    return response()->json(['message' => 'تم حذف السؤال بنجاح']);
}

}
