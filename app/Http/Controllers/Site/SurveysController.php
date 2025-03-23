<?php


namespace App\Http\Controllers\Site;


use App\Http\Controllers\Controller;
use App\Models\Surveys\Finance_service;
use App\Models\Surveys\TrainingCenters;
use Illuminate\Http\Request;


class SurveysController extends Controller
{

    function TrainingCenters(Request $request)
    {
        $all = TrainingCenters::with('district', 'city')->paginate(12);
//        $data['teacher'] = $this->prepare_data(TeacherResource::collection($data['all']));
        return view('web_site.Surveys.TrainingCenters', compact('all'))
            ->with('i', ($request->input('page', 1) - 1) * 12);
    }

    function FinanceService(Request $request)
    {
        $all = TrainingCenters::paginate(12);
//        $data['teacher'] = $this->prepare_data(TeacherResource::collection($data['all']));
        return view('web_site.Surveys.FinanceService', compact('all'))
            ->with('i', ($request->input('page', 1) - 1) * 12);
    }

    function TrainingCentersDetails(Request $request, $id)
    {
        $data['one_data'] = TrainingCenters::with('district', 'city')->findorfail($id);
        $data['pageTitle']=trans('web_site.TrainingCentersDetails');
//        dd($one_data);
        return view('web_site.Surveys.details', $data);

    }
    function FinanceServiceDetails(Request $request, $id)
    {
        $data['one_data'] = Finance_service::with('district', 'city')->findorfail($id);
        $data['pageTitle']=trans('web_site.FinanceServiceDetails');
        return view('web_site.Surveys.details', $data);

    }

}
