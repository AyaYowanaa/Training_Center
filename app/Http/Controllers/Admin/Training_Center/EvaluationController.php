<?php

namespace App\Http\Controllers\Admin\Training_Center;
use App\Http\Controllers\Controller;
use App\Models\training_center\Training_Courses;
use App\Models\training_center\Evaluation;
use App\Models\training_center\Evaluation_Questions;

use Exception;
use Illuminate\Http\Request;
/*  use App\Http\Requests\training_center\Evaluation\StoreRequest;
use App\Http\Requests\training_center\Evaluation\UpdateRequest;  */
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class EvaluationController extends Controller
{

    public function index(Request $request)
    {

        if ($request->ajax()) {
            $allData = Evaluation::select('*');
            return Datatables::of($allData)
              
                ->editColumn('course_id', function ($row) {
                    return $row->coursesData?->title ?? '—';
                })
                ->addColumn('action', function ($row) {
                    return '<a href="#" class="btn btn-sm btn-light btn-active-light-primary"
                   data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"> ' . trans('forms.action') . '
                   <span class="svg-icon svg-icon-5 m-0">
                       <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                       xmlns="http://www.w3.org/2000/svg">
                           <path d="M11.4343 12.7344L7.25 8.55005C6.83579
                           8.13583 6.16421 8.13584 5.75 8.55005C5.33579
                           8.96426 5.33579 9.63583 5.75 10.05L11.2929
                           15.5929C11.6834 15.9835 12.3166 15.9835
                           12.7071 15.5929L18.25 10.05C18.6642 9.63584
                            18.6642 8.96426 18.25 8.55005C17.8358 8.13584
                            17.1642 8.13584 16.75 8.55005L12.5657
                             12.7344C12.2533 13.0468 11.7467 13.0468
                             11.4343 12.7344Z" fill="currentColor" />
                       </svg>
                   </span>
                 </a>
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                        <div class="menu-item px-3">
                             <a href="' . route('admin.TrainingCenter.Evaluation.edit', $row->id) . '"
                               address="' . trans('forms.edit') . '" class="menu-link px-3"
                               >' . trans('forms.edite_btn') . '</a>
                        </div>
                           <div class="menu-item px-3">
                             <a href="' . route('admin.TrainingCenter.Evaluation.questions', $row->id) . '"
                               address="' . trans('fexam.questions') . '" class="menu-link px-3"
                               >' . trans('exam.questions') . '</a>
                        </div>
                    
                        <div class="menu-item px-3">
                                <a href="' . route('admin.TrainingCenter.Evaluation.destroy', $row->id) . '" data-kt-table-delete="delete_row"
                                           address="' . trans('forms.delete_btn') . '" class="menu-link px-3"
                                           >' . trans('forms.delete_btn') . '</a>
                        </div>
                  </div>



                   </div>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('dashbord.admin.Training_Center.Evaluation.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashbord.admin.Training_Center.Evaluation.create');

    }

  /*   public function show_load($id)
    {
        $data['one_data'] = Evaluation::findOrFail($id);

        return view('dashbord.admin.Training_Center.Evaluation.load_details', $data);
    } */

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        try {

            $insert_data = $request->all();
            $inserted_data = Evaluation::create($insert_data);
            $insert_id = $inserted_data->id;
            
            toastr()->addSuccess(trans('forms.success'));
            return redirect()->route('admin.TrainingCenter.Evaluation.index');
        
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    public function edit($id)
    {
        $data['one_data'] = Evaluation::findOrFail($id);
        return view('dashbord.admin.Training_Center.Evaluation.edit', $data);

    }
    public function add_question($id)
    {
        $data['one_data'] = Evaluation::findOrFail($id);
        return view('dashbord.admin.Training_Center.Evaluation.load_add_question', $data);

    }
    public function questions($id)
    {
        $data['one_data'] = Evaluation::findOrFail($id);
        return view('dashbord.admin.Training_Center.Evaluation.questions.create', $data);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $data = Evaluation::find($request->id);
            $update_data = $request->all();
            $data->update($update_data);
        
        toastr()->addSuccess(trans('forms.success'));
        return redirect()->route('admin.TrainingCenter.Evaluation.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {

            $one_data = Evaluation::find($id);
            $one_data->delete();
            toastr()->error(trans('forms.Delete'));
            return response()->json(['message' => trans('forms.Delete')], 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);

        }
    }

/************************************* Questions ************************************** */
    public function getQuestions(Request $request)
    {


        $exam_id = $request->input('exam_id');
        $allData = Exam_Questions::select('*')->where('exam_id', $exam_id);
     
        return Datatables::of($allData)
       
           ->addColumn('action', function ($row) {
    $deleteUrl = route('admin.TrainingCenter.Evaluation.questions.delete', $row->id);
    return '<a href="' . $deleteUrl . '" class="btn btn-sm btn-icon btn-danger"
        data-kt-table-delete="delete_row">
        <i class="ki-duotone ki-trash-square fs-1 ">
            <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span>
        </i>
    </a>';
})

            ->rawColumns(['action'])
            ->make(true);

    }


    public function storeQuestion(Request $request)
    {
        
      $validated = $request->validate([
        'q_text' => 'required|string',
        'q_choices' => 'required|array|min:2', 
        'q_answer' => 'required|string',
        'mark' => 'required|numeric',
      ]);


        try {

            $insert_data = $request->all();
            $inserted_data = Evaluation_Questions::create($insert_data);
            $insert_id = $inserted_data->id;
            
            toastr()->addSuccess(trans('forms.success'));
            return redirect()->route('admin.TrainingCenter.Evaluation.questions');
        
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }
  
    public function deleteQuestion($id)
{
    $question = Evaluation_Questions::find($id);

    if (!$question) {
        return response()->json(['message' => 'السؤال غير موجود'], 404);
    }

    $question->delete();

    return response()->json(['message' => 'تم حذف السؤال بنجاح']);
}

}