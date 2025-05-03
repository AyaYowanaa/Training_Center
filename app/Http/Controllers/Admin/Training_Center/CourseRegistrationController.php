<?php

namespace App\Http\Controllers\Admin\Training_Center;

use App\Http\Controllers\Controller;
use App\Http\Requests\training_center\CourseRegistration\StoreRequest;
use App\Models\training_center\Course_registration;
use App\Models\training_center\Students;
use DB;
use Illuminate\Http\Request;
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
                $request->student_id,
                $request->input('entity_id')
            );

            toastr()->addSuccess(trans('forms.success'));
            return redirect()->route('admin.Settings.training_courses.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
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
        $allData = Students::select('*');
        return Datatables::of($allData)
            ->editColumn('name', function ($row) {
                return $row->name;
            })
            /*->addColumn('action', function ($row) {
                return '<a href="#" class="btn btn-sm btn-icon btn-success">
<i class="ki-duotone ki-plus-square fs-2">
<span class="path1"></span>
<span class="path2"></span>
<span class="path3"></span>
</i></i>
</a>';
            })*/

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

}
