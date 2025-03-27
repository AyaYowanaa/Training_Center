<?php

namespace App\Http\Controllers\Admin\Training_Center\Settings;

use App\Http\Controllers\Controller;
use App\Models\setting\Entity;
use Illuminate\Http\Request;



class entitySettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $obj=Entity::all();
        return view('dashbord.admin.Training_center.setting.entities.index',compact('obj'));
    }

   
    public function store(Request $request)
    {

        try {

            $insert_data = $request->all();
           $insert_data['name'] = ['en' => $request->name_en, 'ar' => $request->name_ar];          
           $insert_data['address'] = ['en' => $request->address_en, 'ar' => $request->address_ar];          

           $inserted_data = Entity::create($insert_data);
            $insert_id = $inserted_data->id;


            toastr()->addSuccess(trans('forms.success'));
            return redirect()->route('admin.Settings.Entity.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    public function update(Request $request, $id)
    {
        try {
            $data = Entity::find($id);
            $update_data = $request->all();
            $update_data['name'] = ['en' => $request->name_en, 'ar' => $request->name_ar];
            $insert_data['address'] = ['en' => $request->address_en, 'ar' => $request->address_ar];          
            $data->update($update_data);
            toastr()->addSuccess(trans('forms.success'));
            return redirect()->route('admin.Settings.Entity.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function show(Entity $entity)
    {
        //
    }
    public function delete($id)
    {
       
        try {
           
            $delete_data = Entity::find($id);
            $delete_data->delete();
            toastr()->addSuccess(trans('forms.Delete'));

            return redirect()->route('admin.Settings.Entity.index');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

}
