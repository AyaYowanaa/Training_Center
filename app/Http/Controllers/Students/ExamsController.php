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


    public function startExam(Request $request)
    {
        $attempt = ExamAttempt::firstOrCreate(
            [
                'student_id' => auth()->id(),
                'exam_id' => $request->exam_id,
                'completed_at' => null
            ],
            [
                'started_at' => now()
            ]
        );

        return response()->json(['attempt_id' => $attempt->id]);
    }

    public function autoSaveAnswers(Request $request)
    {
        $studentId = auth()->id();
        $examId = $request->exam_id;

        $attempt = ExamAttempt::where('student_id', $studentId)
            ->where('exam_id', $examId)
            ->whereNull('completed_at')
            ->firstOrFail();

        foreach ($request->question as $questionId => $studentAnswer) {
            $question = Exam_Questions::find($questionId);
            $isCorrect = $studentAnswer === $question->q_answer;

            StudentExamAnswer::updateOrCreate(
                [
                    'student_id' => $studentId,
                    'exam_id' => $examId,
                    'question_id' => $questionId,
                    'attempt_id' => $attempt->id
                ],
                [
                    'answer' => $studentAnswer,
                    'is_correct' => $isCorrect,
                ]
            );
        }

        return response()->json(['status' => 'success']);
    }

    public function forceSubmit(Request $request)
    {
        $studentId = auth()->id();
        $examId = $request->exam_id;

        $attempt = ExamAttempt::where('student_id', $studentId)
            ->where('exam_id', $examId)
            ->whereNull('completed_at')
            ->firstOrFail();

        $totalScore = 0;

        foreach ($request->question as $questionId => $studentAnswer) {
            $question = Exam_Questions::find($questionId);
            $isCorrect = $studentAnswer === $question->q_answer;

            if ($isCorrect) {
                $totalScore += $question->mark;
            }

            StudentExamAnswer::updateOrCreate(
                [
                    'student_id' => $studentId,
                    'exam_id' => $examId,
                    'question_id' => $questionId,
                    'attempt_id' => $attempt->id
                ],
                [
                    'answer' => $studentAnswer,
                    'is_correct' => $isCorrect,
                ]
            );
        }

        $attempt->update([
            'completed_at' => now(),
            'total_score' => $totalScore,
            'time_spent' => now()->diffInSeconds($attempt->started_at)
        ]);

        return response()->json([
            'redirect_url' => route('exams.results', $attempt->id)
        ]);
    }
}
