<?php

namespace App\Http\Controllers\Admin\Training_Center;

use App\Http\Controllers\Controller;
use App\Models\training_center\Trainer;
//use App\Models\training_center\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class TrainerController extends Controller
{
  
    public function index(Request $request)
    {

        return view('dashbord.admin.Training_Center.Trainers.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {    $data['one_data']= new Trainer();
        return view('dashbord.admin.Training_Center.Trainers.create'
        , $data);

    }
    public function show_load($id)
    {
        $data['one_data'] = Trainer::findOrFail($id);

        return view('dashbord.admin.Training_Center.Trainers.load_details', $data);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        try {
          //  dd($request->input('courses_id'));

            $insert_data = $request->all();
            $insert_data['name'] = ['en' => $request->name_en, 'ar' => $request->name_ar];
            $inserted_data = Trainer::create($insert_data);
            $insert_id = $inserted_data->id;
            toastr()->addSuccess(trans('forms.success'));
            return redirect()->route('admin.Settings.Instuctor.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    public function edit($id)
    {
        $data['one_data'] = Trainer::findOrFail($id);
        return view('dashbord.admin.Training_Center.Trainers.edit',$data);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $data = Trainer::find($request->id);
            $update_data['name'] = ['en' => $request->name_en, 'ar' => $request->name_ar];
            $update_data = $request->all();
            $data->update($update_data);
            toastr()->addSuccess(trans('forms.success'));
            return redirect()->route('admin.Settings.Instuctor.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
       
        try {
           
            $delete_data = Trainer::find($id);
            $delete_data->delete();
            toastr()->addSuccess(trans('forms.Delete'));

            return redirect()->route('admin.Settings.Instuctor.index');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


}
