<?php

namespace App\Http\Controllers\Admin\Training_Center;

use App\Http\Controllers\Controller;
use App\Http\Requests\training_center\AttendanceStudents\StoreAttendanceStudentsRequest;
use App\Http\Requests\training_center\AttendanceStudents\UpdateAttendanceStudentsRequest;
use App\Models\training_center\AttendanceStudents;
use App\Models\training_center\Course_registration;
use App\Models\training_center\Students;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTables;

class AttendanceStudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashbord.admin.Training_Center.attendance_students.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAttendanceStudentsRequest $request)
    {
        $validator = Validator::make($request->all(), [
            'course_id' => [
                'required',
                Rule::exists('tc_courses', 'id')

            ], 'student_id' => [
                'required',
                Rule::exists('tc_students', 'id')

            ],
        ]);
        if ($validator->fails()) {
            // If the request is AJAX, return JSON with status code 422
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }
        try {
            AttendanceStudents::recoredStudent(
                $request->course_id,
                $request->student_id,
                $request->input('entity_id')
            );
            return response()->json(['message' => trans('forms.success')], 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);

        }
    }
    public function storeAll(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'course_id' => [
                'required',
                Rule::exists('tc_courses', 'id')
            ]
        ]);
        if ($validator->fails()) {
            // If the request is AJAX, return JSON with status code 422
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }
        try {
            $course_id = $request->input('course_id');
            $entity_id = $request->input('entity_id');

            $listStudentIDs = AttendanceStudents::select('student_id')->where('course_id', $course_id);
            if ($entity_id) {
                $listStudentIDs->where('entity_id', $entity_id);
            }
            $listStudentIDs->get()->pluck('student_id')->toArray();

            $allData = Course_registration::select('*')->where('course_id', $course_id)->whereNotIn('student_id', $listStudentIDs)->get()->pluck('student_id')->toArray();
            foreach ($allData as $student) {
                AttendanceStudents::recoredStudent(
                    $request->course_id,
                    $student,
                    $request->input('entity_id')
                );
            }
            return response()->json(['message' => trans('forms.success')], 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(AttendanceStudents $attendanceStudents)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AttendanceStudents $attendanceStudents)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAttendanceStudentsRequest $request, AttendanceStudents $attendanceStudents)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AttendanceStudents $attendanceStudents)
    {
        //
    }

    public function getCourseStudent(Request $request)
    {

//        if ($request->ajax()) {
        $course_id = $request->input('course_id');
        $entity_id = $request->input('entity_id');
        $allData = AttendanceStudents::select('*')->where('course_id', $course_id);
        if ($entity_id) {
            $allData->where('entity_id', $entity_id);
        }
        return Datatables::of($allData)
            ->editColumn('name', function ($row) {
                return optional($row->studentData)->name;
            })->editColumn('entity', function ($row) {
                return optional($row->entityData)->name;
            })->editColumn('code', function ($row) {
                return optional($row->studentData)->code;
            })
            ->addColumn('action', function ($row) {
                return '<a href="#" class="btn btn-sm btn-icon btn-danger btn-remove-student"
                data-id="' . $row->id . '">
                <i class="ki-duotone ki-trash-square fs-1 ">
 <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>
            </a>';
            })
            ->rawColumns(['action'])
            ->make(true);
//        }
    }

    public function getStudent(Request $request)
    {

//        if ($request->ajax()) {
        $course_id = $request->input('course_id');
        $entity_id = $request->input('entity_id');

        $listStudentIDs = AttendanceStudents::select('student_id')->where('course_id', $course_id);
        if ($entity_id) {
            $listStudentIDs->where('entity_id', $entity_id);
        }
        $listStudentIDs->get()->pluck('student_id')->toArray();

        $allData = Course_registration::select('*')->where('course_id', $course_id)->whereNotIn('student_id', $listStudentIDs);
        if ($entity_id) {
            $allData->where('entity_id', $entity_id);
        }
        return Datatables::of($allData)
            ->editColumn('name', function ($row) {
                return optional($row->studentData)->name;
            })->editColumn('entity', function ($row) {
                return optional($row->entityData)->name;
            })->editColumn('code', function ($row) {
                return optional($row->studentData)->code;
            })
            ->addColumn('action', function ($row) {
                return '<a href="#" class="btn btn-sm btn-icon btn-success btn-add-student"
                data-id="' . $row->id . '"
                data-student_id="' . optional($row->studentData)->id . '"
                data-entity_id="' . optional($row->entityData)->id . '"
                data-name="' . $row->name . '"
                data-code="' . $row->code . '"
                data-phone="' . $row->phone . '">
                <i class="ki-duotone ki-plus-square fs-2">
                    <span class="path1"></span>
                    <span class="path2"></span>
                    <span class="path3"></span>
                </i>
            </a>';
            })

            ->rawColumns(['action'])
            ->make(true);
//        }
    }

    public function deleteStudent(Request $request)
    {
        try {
            $id = $request->id;

            AttendanceStudents::destroy($id);

            return response()->json(['message' => 'Record is deleted successfully.'], 200);
            //return redirect()->back();

            // return redirect()->route('admin.Products.Settings.Units.index');
        } catch (Exception $e) {
            /*            return redirect()->back()->withErrors(['error' => $e->getMessage()]);*/
            return response()->json(['error' => $e->getMessage()], 500);

        }
    }
}
