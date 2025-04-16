<?php

namespace App\Http\Controllers\Admin\Training_Center\Settings;

use App\Http\Controllers\Controller;
use App\Models\setting\Expenses;
use Illuminate\Http\Request;



class ExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $obj=Expenses::all();
        return view('dashbord.admin.Training_Center.setting.Expenses.index',compact('obj'));
    }

   
    public function store(Request $request)
    {

        try {

            $insert_data = $request->all();
           $insert_data['name'] = ['en' => $request->name_en, 'ar' => $request->name_ar];          
            $inserted_data = Expenses::create($insert_data);
            $insert_id = $inserted_data->id;


            toastr()->addSuccess(trans('forms.success'));
            return redirect()->route('admin.Settings.Expenses.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    public function update(Request $request, $id)
    {
        try {
            $data = Expenses::find($id);
            $update_data = $request->all();
            $update_data['name'] = ['en' => $request->name_en, 'ar' => $request->name_ar];
            $data->update($update_data);
            toastr()->addSuccess(trans('forms.success'));
            return redirect()->route('admin.Settings.Expenses.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function show(Expenses $Expenses)
    {
        //
    }
    public function delete($id)
    {
       
        try {
           
            $delete_data = Expenses::find($id);
            $delete_data->delete();
            toastr()->addSuccess(trans('forms.Delete'));

            return redirect()->route('admin.Settings.Expenses.index');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

}
