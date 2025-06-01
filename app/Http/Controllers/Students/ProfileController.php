<?php

namespace App\Http\Controllers\Students;
use App\Models\training_center\Students;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ProfileController extends Controller
{
   
public function edit()
    {
        $data = Students::find(auth()->guard('student')->user()->id);
        return view('students_dashboard.edit_Profile', compact('data'));
    }




    public function update(SupplierUpdateRequest $request)
    {
            try {
                $data = Students::find(auth()->guard('student')->user()->id);
                $insert_data = $request->all();
            
                $data->update($insert_data);
    
    
                toastr()->addSuccess(trans('forms.success'));

                return redirect()->route('student.profile.edit');
            } catch (Exception $e) {
                return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            }
        }
 /************************************************************************* */
 /* public function show($id)
    {
        $data['one_data'] = Students::with('Courses.locationData', 'Courses.coursesData',
         'invoice.coursesData', 'attendances.coursesData')->findOrFail(auth()->guard('student')->user()->id);
        return view('students_dashboard.student_details.details', $data);
    }
 */
public function show()
{
    $data['one_data'] = Students::with(
        'Courses.locationData',
        'Courses.coursesData',
        'invoice.coursesData',
        'attendances.coursesData'
    )->findOrFail(auth()->guard('student')->user()->id);

    return view('students_dashboard.student_details.details', $data);
}
}
