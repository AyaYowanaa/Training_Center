<?php

namespace App\Http\Controllers\Admin\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\MainRequest;
use App\Models\Site\SiteData;
use App\Traits\ImageProcessing;
use Illuminate\Http\Request;

class MaindataController extends Controller
{
    use ImageProcessing;

    public function index()
    {
        $mdata = SiteData::select('*')->first();

        return view('dashbord.maindata.insert', compact('mdata'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MainRequest $request)
    {
        try {
            //$data = new SiteData();


            $request->validated();
            $data = $request->all();

            $data['name'] = ['ar' => $request->name_ar, 'en' => $request->name_en];
            $data['address'] = ['ar' => $request->address_ar, 'en' => $request->address_en];
            $data['short_about'] = ['ar' => $request->short_about_ar, 'en' => $request->short_about_en];
            /*$data['email'] = $request->email;
            $data['fax'] = $request->fax;
            $data['phone'] = $request->phone;
            $data['maplocation'] = $request->maplocation;*/
            if ($request->hasFile('image')) {
                $img = $request->file('image');
                $data['image'] = $this->upload_image($img, 'maindata');

            }
                $img_footer = $request->file('logo_footer');
                $data['logo_footer'] = $this->upload_image($img_footer, 'maindata');
                
            $data['video'] = extractVideoId($request->video);

            if ($request->has('id') && (!empty($request->id))) {
                $mdata = SiteData::find($request->id);                  // another var to avoid conflict
                $mdata->update($data);
            } else {
                SiteData::truncate();
//                dd($data);
                SiteData::create($data);
            }
            // dd($data);
            toastr()->addSuccess(trans('forms.success'));
            return redirect()->route('admin.mdata.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(SiteData $maindata)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SiteData $maindata)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SiteData $maindata)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SiteData $maindata)
    {
        //
    }
}
