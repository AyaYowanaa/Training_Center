<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\setting\District;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function getDistricts(Request $request)
    {
        $search = $request->input('search');
        $city_id = $request->input('city_id');
        $selectedId = $request->input('selectedId');
        $page = $request->input('page', 1);
        $limit = 10;
        $offset = ($page - 1) * $limit;

        $query = District::select('id', 'name')->where('city_id',$city_id);

        if (!empty($search)) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        $data = $query->limit($limit)
            ->offset($offset)
            ->get();
        foreach ($data as $item) {
            // Set 'selected' to true or false based on some condition (example: $item->id === $selectedId)
            $item->selected = $item->id === $selectedId; // Adjust the condition as per your logic
        }
        return response()->json(array('data'=>$data,'total'=>District::where('city_id',$city_id)->count()));
    }

}
