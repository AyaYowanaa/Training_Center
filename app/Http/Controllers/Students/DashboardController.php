<?php


namespace App\Http\Controllers\Students;


use App\Http\Controllers\Controller;
//use App\Models\POS\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index(Request $request)
    {
        $student_id = auth('student')->user()->id;

        return view('students_dashboard.home');


    }


   
}
