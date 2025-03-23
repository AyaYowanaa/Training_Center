<?php

namespace App\Http\Controllers\Admin\Site;

use App\Models\Site\SiteStatistics;
use Illuminate\Http\Request;
use App\Http\Requests\Site\statistics\StatisticsRequest;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Resources\Site\StatisticsResource;

class SiteStatisticsController extends Controller
{
    protected $upload_folder = 'Site/statistics';

    public function index(Request $request)
    {


            if ($request->ajax()) {
                $allData = SiteStatistics::select('*');
                return Datatables::of($allData)
                    ->editColumn('number', function ($row) {
                        return $row->number;
                    })->editColumn('title', function ($row) {
                        return $row->title;
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
                                 <a href="' . route('admin.statistics.edit', $row->id) . '"
                                   name="' . trans('forms.edite_btn') . '" class="menu-link px-3"
                                   >' . trans('forms.edite_btn') . '</a>
                            </div>


                            <div class="menu-item px-3">
                                    <a href="' . route('admin.statistics.destroy', $row->id) . '" data-kt-table-delete="delete_row"
                                               name="' . trans('forms.delete_btn') . '" class="menu-link px-3"
                                               >' . trans('forms.delete_btn') . '</a>
                            </div>
                      </div>



                       </div>';
                    })
                    ->rawColumns(['action'])
                    ->make(true);
                }
            return view('dashbord.admin.Site.statistics.index');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashbord.admin.Site.statistics.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StatisticsRequest $request)
    {
        try {

            $insert_data = $request->all();
            $insert_data['title'] = ['en' => $request->title_en, 'ar' => $request->title_ar];
            $inserted_data =SiteStatistics::create($insert_data);
            $insert_id = $inserted_data->id;


            toastr()->addSuccess(trans('forms.success'));
            return redirect()->route('admin.statistics.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $one_data = SiteStatistics::findOrFail($id);
        $one_data = new StatisticsResource ($one_data);
        $data['one_data'] = $this->prepare_data($one_data);
        return view('dashbord.admin.Site.statistics.details', $data);
    }

    public function show_load($id)
    {
        $one_data = SiteStatistics::findOrFail($id);
        $one_data = new StatisticsResource($one_data);
        $data['one_data'] = $this->prepare_data($one_data);
        return view('dashbord.admin.Site.statistics.load_details', $data);
    }
    public function edit($id)
    {
        $one_data = SiteStatistics::findOrFail($id);
        $one_data = new StatisticsResource($one_data);
        $data['one_data'] = $this->prepare_data($one_data->edite_data($one_data));

        return view('dashbord.admin.Site.statistics.edit', $data);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StatisticsRequest $request,$id)
    {
        try {
            $data = SiteStatistics::find($request->id);

            $update_data = $request->all();
            $update_data['title'] = ['en' => $request->title_en, 'ar' => $request->title_ar];
            $data->update($update_data);

            toastr()->addSuccess(trans('forms.success'));
            return redirect()->route('admin.statistics.index');
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

            $delete_data = SiteStatistics::find($id);
            SiteStatistics::destroy($id);
            toastr()->error(trans('forms.Delete'));

            return response()->json(['message' => 'Image deleted successfully.'], 200);
            return redirect()->route('admin.statistics.index');

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);

        }
    }
}
