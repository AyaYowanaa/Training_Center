<?php

namespace App\Http\Controllers\Admin\Training_Center\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditeCityRequest;
use App\Models\setting\City;

class CityController extends Controller
{

    public function index()
    {
        $city = City::all();
        return view('dashbord.admin.setting.cities.show-city', compact('city'));
    }

    public function create()
    {
    }

    public function store(EditeCityRequest $request)
    {
        try {
            $request->validated();

            $city = new City();
            $city->city_name = ['ar' => $request->city_name_ar, 'en' => $request->city_name_en];
            $city->save();
            toastr()->addSuccess(trans('forms.success'));
            return redirect()->route('admin.store.city.index');

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function edit($id)
    {

    }

    public function update(EditeCityRequest $request, $id)
    {
        try {
            $city_id = $id;
            $city = City::findorfail($city_id);
            $city->city_name = ['ar' => $request->city_name_ar, 'en' => $request->city_name_en];
            $city->update();
            toastr()->addSuccess(trans('forms.Update'));
            return redirect()->route('admin.store.city.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function delete($id)
    {
        try {
            City::destroy($id);
            toastr()->addSuccess(trans('forms.Delete'));

            return redirect()->route('admin.store.city.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}





