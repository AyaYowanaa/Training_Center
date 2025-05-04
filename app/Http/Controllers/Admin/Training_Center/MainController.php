<?php

namespace App\Http\Controllers\Admin\Training_Center;

use App\Http\Controllers\Controller;
use App\Models\setting\Entity;
use App\Models\training_center\Course_registration;
use App\Models\training_center\Students;
use App\Models\training_center\TrainingCourse;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function getTrainingCourseStudent(Request $request)
    {
        $search = $request->input('search');
        $selectedId = $request->input('selectedId');
        $student_id = $request->input('student_id');
        $page = $request->input('page', 1);
        $limit = 10;
        $offset = ($page - 1) * $limit;

        $listCourseIDs = Course_registration::select('course_id')->where('student_id', $student_id)->get()->pluck('course_id')->toArray();
        $query = TrainingCourse::select('id', 'title', 'code')->whereIn('id', $listCourseIDs);

        if (!empty($search)) {
            $query->where('title', 'like', '%' . $search . '%');
            $query->orWhere('code', 'like', '%' . $search . '%');
        }

        $data = $query->limit($limit)
            ->offset($offset)
            ->get();
        foreach ($data as $item) {
            // Set 'selected' to true or false based on some condition (example: $item->id === $selectedId)
            $item->selected = $item->id === $selectedId; // Adjust the condition as per your logic
            $item->text = $item->code .'-'. $item->title;
        }
        return response()->json(array('data' => $data, 'total' => $query->count()));
    }

    public function getStudent(Request $request)
    {
        $search = $request->input('search');
        $selectedId = $request->input('selectedId');
        $page = $request->input('page', 1);
        $limit = 10;
        $offset = ($page - 1) * $limit;

        $query = Students::select('id', 'name', 'code')->whereHas('registeredCourses');
        if (!empty($search)) {
            $query->where('name', 'like', '%' . $search . '%');
            $query->orWhere('code', 'like', '%' . $search . '%');
        }

        $data = $query->limit($limit)
            ->offset($offset)
            ->get();
        foreach ($data as $item) {
            // Set 'selected' to true or false based on some condition (example: $item->id === $selectedId)
            $item->selected = $item->id === $selectedId; // Adjust the condition as per your logic
            $item->text = $item->code .'-'. $item->name;
        }
        return response()->json(array('data' => $data, 'total' => $query->count()));
    }
    public function getTrainingCourse(Request $request)
    {
        $search = $request->input('search');
        $selectedId = $request->input('selectedId');
        $page = $request->input('page', 1);
        $limit = 10;
        $offset = ($page - 1) * $limit;

        $query = TrainingCourse::select('id', 'title', 'code');

        if (!empty($search)) {
            $query->where('title', 'like', '%' . $search . '%');
            $query->orWhere('code', 'like', '%' . $search . '%');
        }

        $data = $query->limit($limit)
            ->offset($offset)
            ->get();
        foreach ($data as $item) {
            // Set 'selected' to true or false based on some condition (example: $item->id === $selectedId)
            $item->selected = $item->id === $selectedId; // Adjust the condition as per your logic
            $item->name = $item->title;
        }
        return response()->json(array('data' => $data, 'total' => $query->count()));
    }

    public function getEntity(Request $request)
    {
        $search = $request->input('search');
        $selectedId = $request->input('selectedId');
        $page = $request->input('page', 1);
        $limit = 10;
        $offset = ($page - 1) * $limit;

        $query = Entity::select('id', 'name');

        if (!empty($search)) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        $data = $query->limit($limit)
            ->offset($offset)
            ->get();
        foreach ($data as $item) {
            // Set 'selected' to true or false based on some condition (example: $item->id === $selectedId)
            $item->selected = $item->id === $selectedId; // Adjust the condition as per your logic
            $item->title = $item->name;
        }
        return response()->json(array('data' => $data, 'total' => $query->count()));
    }

}
