<?php

namespace App\Http\Controllers\Admin\Site;

use App\Models\Site\SiteFeedback;
use Illuminate\Http\Request;
use App\Http\Requests\Site\feedback\FeedbackRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\Site\FeedbackResource;
use Yajra\DataTables\Facades\DataTables;

class SiteFeedbackController extends Controller
{

    protected $upload_folder = 'Site/feedback';


    public function index(Request $request)
    {
        
        if ($request->ajax()) {
            $allData = SiteFeedback::select('*');
            return Datatables::of($allData)
                ->editColumn('name', function ($row) {
                    return $row->name;
                })->editColumn('jop_title', function ($row) {
                    return $row->jop_title;
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
                             <a href="' . route('admin.feedback.edit', $row->id) . '"
                               name="' . trans('forms.edite_btn') . '" class="menu-link px-3"
                               >' . trans('forms.edite_btn') . '</a>
                        </div>
                   	
                        <div class="menu-item px-3">
                                <a href="javascript:void(0)" data-kt-table-details="details_row" data-url="' . route('admin.feedback.load_details', $row->id) . '"
                                           name="' . trans('forms.details') . '" class="menu-link px-3"
                                         data-bs-toggle="modal" data-bs-target="#kt_modal_1"  >' . trans('forms.details') . '</a>
                        </div>
                        <div class="menu-item px-3">
                                <a href="' . route('admin.feedback.destroy', $row->id) . '" data-kt-table-delete="delete_row"
                                           name="' . trans('forms.delete_btn') . '" class="menu-link px-3"
                                           >' . trans('forms.delete_btn') . '</a>
                        </div>
                  </div>



                   </div>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('dashbord.admin.Site.feedback.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashbord.admin.Site.feedback.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FeedbackRequest $request)
    {
        try {

            $insert_data = $request->all();
            $insert_data['name'] = ['en' => $request->name_en, 'ar' => $request->name_ar];
            $insert_data['jop_title'] = ['en' => $request->jop_title_en, 'ar' => $request->jop_title_ar];
            $insert_data['feedback'] = ['en' => $request->feedback_en, 'ar' => $request->feedback_ar];
            if ($request->hasFile('image')) {
                $file = $request->file('image');

                $dataX = $this->saveImage($file, $this->upload_folder);
                $insert_data['image'] = $dataX;
            }

            $inserted_data = SiteFeedback::create($insert_data);
            $insert_id = $inserted_data->id;
             
        
            toastr()->addSuccess(trans('forms.success'));
            return redirect()->route('admin.feedback.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    /*public function show($id)
    {
        $one_data = SiteFeedback::findOrFail($id);
        $one_data = new FeedbackResource($one_data);
        $data['one_data'] = $this->prepare_data($one_data);
        return view('dashbord.admin.Site.feedback.details', $data);
    }*/

    public function show_load($id)
    {
        $one_data = SiteFeedback::findOrFail($id);
        $one_data = new FeedbackResource($one_data);
        $data['one_data'] = $this->prepare_data($one_data);
        return view('dashbord.admin.Site.feedback.load_details', $data);
    }
    public function edit($id)
    {
        $one_data = SiteFeedback::findOrFail($id);
        $one_data = new FeedbackResource($one_data);
        $data['one_data'] = $this->prepare_data($one_data->edite_data($one_data));

        return view('dashbord.admin.Site.feedback.edit', $data);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FeedbackRequest $request,$id)
    {
        try {
            $data = SiteFeedback::find($request->id);

            $update_data = $request->all();
            $update_data['name'] = ['en' => $request->name_en, 'ar' => $request->name_ar];
            $update_data['jop_title'] = ['en' => $request->jop_title_en, 'ar' => $request->jop_title_ar];
            $update_data['feedback'] = ['en' => $request->feedback_en, 'ar' => $request->feedback_ar];
            if ($request->hasFile('image')) {
                $file = $request->file('image');

                $dataX = $this->saveImage($file, $this->upload_folder);
                $update_data['image'] = $dataX;

            }
            $data->update($update_data);

//            dd($insert_data);
            toastr()->addSuccess(trans('forms.success'));
            return redirect()->route('admin.feedback.index');
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

            $delete_data = SiteFeedback::find($id);
            SiteFeedback::destroy($id);
            $this->deleteImage($delete_data->image);
            toastr()->error(trans('forms.Delete'));
            return response()->json(['message' => 'Image deleted successfully.'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);

        }

        
     /*   try {
            SiteFeedback::destroy($id);
            toastr()->addSuccess(trans('forms.Delete'));

            return redirect()->route('admin.feedback.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        } */
    }
}
