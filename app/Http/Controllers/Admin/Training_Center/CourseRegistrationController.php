<?php

namespace App\Http\Controllers\Admin\Training_Center;

use App\Http\Controllers\Controller;
use App\Http\Requests\training_center\CourseRegistration\StoreRequest;
use App\Models\training_center\Course_registration;
use App\Models\training_center\Students;
use DB;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTables;

class CourseRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $allData = Course_registration::with('coursesData', 'entityData')
                ->select('course_id', 'entity_id', DB::raw('count(*) as total_students'))
                ->groupBy('course_id', 'entity_id');
            return Datatables::of($allData)
                ->editColumn('course', function ($row) {
                    return $row->coursesData->title ?? '—';
//                    return $row->course_id;
                })->editColumn('entity', function ($row) {
                    return $row->entityData->name ?? '—';
//                    return $row->entity_id;
                })->editColumn('studentCount', function ($row) {
                    return $row->total_students;
                })->orderColumn('course', function ($query, $order) {
                    $query->orderBy('course_id', $order);
                })->orderColumn('entity', function ($query, $order) {
                    $query->orderBy('entity_id', $order);
                })
                /*  ->editColumn('location_id', function ($row) {
                     return $row->locationData?->name ?? '—';
                 }) */
                ->make(true);
        }

        return view('dashbord.admin.Training_Center.student_registration_course.index');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashbord.admin.Training_Center.student_registration_course.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
//        dd($request->all());
        try {

            Course_registration::registerStudents(
                $request->course_id,
                $request->student_ids,
                $request->input('entity_id')
            );

            toastr()->addSuccess(trans('forms.success'));
            return redirect()->route('admin.Settings.training_courses.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function storeStudent(Request $request)
    {
//        dd($request->all());
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
            Course_registration::registerStudent(
                $request->course_id,
                $request->student_id,
                $request->input('entity_id')
            );
            return response()->json(['message' => trans('forms.success')], 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function getStudent(Request $request)
    {

//        if ($request->ajax()) {
        $course_id = $request->input('course_id');
        $entity_id = $request->input('entity_id');

        $listStudentIDs = Course_registration::select('student_id')->where('course_id', $course_id);
        if ($entity_id) {
            $listStudentIDs->where('entity_id', $entity_id);
        }
        $listStudentIDs->get()->pluck('student_id')->toArray();

        $allData = Students::select('*')->whereNotIn('id', $listStudentIDs);
        return Datatables::of($allData)
            ->editColumn('name', function ($row) {
                return $row->name;
            })
            ->addColumn('action', function ($row) {
                return '<a href="#" class="btn btn-sm btn-icon btn-success btn-add-student"
                data-id="' . $row->id . '"
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

    public function getCourseStudent(Request $request)
    {


        $course_id = $request->input('course_id');
        $entity_id = $request->input('entity_id');
        $allData = Course_registration::select('*')->where('course_id', $course_id);
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

    }

    public function deleteStudent(Request $request)
    {
        try {
            $id = $request->id;

            Course_registration::destroy($id);

            return response()->json(['message' => 'Record is deleted successfully.'], 200);
            //return redirect()->back();

            // return redirect()->route('admin.Products.Settings.Units.index');
        } catch (Exception $e) {
            /*            return redirect()->back()->withErrors(['error' => $e->getMessage()]);*/
            return response()->json(['error' => $e->getMessage()], 500);

        }
    }
}
