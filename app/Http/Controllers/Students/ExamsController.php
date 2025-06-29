<?php


namespace App\Http\Controllers\Students;

use App\Models\training_center\Exam_Questions;
use App\Models\training_center\Exams;
use App\Models\training_center\StudentExamAnswer;
use App\Models\training_center\Students;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ExamsController extends Controller
{

    function show()
    {

        $student_id = auth()->guard('student')->user()->id;


        $Courses = Students::with('Courses')->findOrFail($student_id)->Courses->pluck('id');
        $exams = Exams::whereIn('course_id', $Courses)->get();
//        dd($Courses, $exams);

        return view('students_dashboard.exams.list', compact('exams'));


    }

    function questions(Request $request, $exam_id)
    {
        $exam = Exams::findOrFail($exam_id);
        $questions = Exam_Questions::where('exam_id', $exam_id)->get();
//        dd($exam,$questions);
        return view('students_dashboard.exams.questions', compact('questions', 'exam'));

    }

    public function storeStudentAnswers(Request $request)
    {
        try {

            $studentId = auth()->guard('student')->user()->id;

            $examId = $request->exam_id;
            $answers = $request->question; // array of question_id => answer

            foreach ($answers as $questionId => $studentAnswer) {
                $question = Exam_Questions::find($questionId);

                StudentExamAnswer::updateOrCreate(
                    [
                        'student_id' => $studentId,
                        'exam_id' => $examId,
                        'question_id' => $questionId
                    ],
                    [
                        'answer' => $studentAnswer,
                        'degree' => $question->mark,
                        'is_correct' => $studentAnswer === $question->q_answer
                    ]
                );
            }

            toastr()->addSuccess(trans('forms.success'));
            return redirect()->route('student.Exams.show');
        } catch (\Exception $e) {
            toastr()->addError(trans('forms.error_occurred'));

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function showResults($examId)
    {
        $studentId = auth()->guard('student')->user()->id;
        $answers = StudentExamAnswer::with('question')
            ->where('student_id', $studentId)
            ->where('exam_id', $examId)
            ->get();

        $totalQuestions = $answers->count();
        $correctAnswers = $answers->where('is_correct', true)->count();
        $score = ($correctAnswers / $totalQuestions) * 100;

        return view('exams.results', compact('answers', 'score', 'correctAnswers', 'totalQuestions'));
    }
}
