<?php

namespace App\Http\Controllers\Admin\settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditeDistrictRequest;
use App\Models\setting\City;
use App\Models\setting\District;

class DistrictController extends Controller
{

    public function index()
    {
        $district = District::all();
        $cities = City::all();
        return view('dashbord.admin.setting.district.show', compact('district','cities'));

    }

    public function create()
    {

    }

    public function store(EditeDistrictRequest $request)
    {
        try {
            $request->validated();

            //  dd($request);
            $data = new District();
            $data->name = ['ar' => $request->name_ar, 'en' => $request->name_en];
            $data->city_id=$request->city_id;
            $data->save();
            toastr()->addSuccess(trans('forms.success'));

            return redirect()->route('admin.store.district.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    public function edit($id)
    {

    }

    public function update(EditeDistrictRequest $request, $id)
    {
        try {
            $request->validated();

            $group_id = $id;
            $data = District::findorfail($group_id);
            $data->name = ['ar' => $request->name_ar, 'en' => $request->name_en];
            $data->city_id=$request->city_id;

            $data->update();
            toastr()->addSuccess(trans('forms.Update'));

            return redirect()->route('admin.store.district.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function delete($id)
    {
        try {

            District::destroy($id);
            toastr()->addSuccess(trans('forms.Delete'));

            return redirect()->route('admin.store.district.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }


}
