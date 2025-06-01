<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\UserStudent;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class MaindataController extends Controller
{
  

    public function index()
    {

    }

    public function create()
    {

        $one_data = optional(UserStudent::find(auth('student')->user()->id));

        return view('students_dashboard.maindata', compact('one_data'));
    }

    public function store(Request $request)
    {
        $student_id = auth('student')->user()->id;
        $validator = Validator::make($request->all(), [
            'user_name' => 'required|string|max:255',
           
            //'status' => 'required',
           
        ]);
        // Check if validation fails
        if ($validator->fails()) {
            // Redirect back with errors and old input
            return redirect()->back()
                ->withErrors($validator) // Pass validation errors
                ->withInput(); // Pass old input data
        }

        try {
            // Insert data into the database
            $insert_data = $request->all();
//         
            $conditions=['id'=>auth('student')->user()->student_id];
            $inserted_data = UserStudent::updateOrCreate($conditions, $insert_data);
            $user=auth('student')->user();
            $user->student_id=$inserted_data->id;
            $user->save();


            toastr()->addSuccess(trans('forms.success'));

            return redirect()->route('students_dashboard.Maindata.create');
        } catch (Exception $e) {

            return redirect()->back()
                ->withErrors(['error' => $e->getMessage()])
                ->withInput(); // Pass old input data
        }
    }


}
