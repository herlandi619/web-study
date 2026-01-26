<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Score;
use App\Models\Subject;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    // INDEX: daftar mata pelajaran yang punya kuis
    public function index()
    {
        $subjects = Subject::whereHas('quizzes')->get();
        return view('quizzes.index', compact('subjects'));
    }

    // START: tampilkan soal
    public function start($subjectId)
    {
        $subject = Subject::findOrFail($subjectId);
        $quizzes = Quiz::where('subject_id', $subjectId)->get();

        return view('quizzes.start', compact('subject', 'quizzes'));
    }

    public function submit(Request $request, $subjectId)
    {
        $quizzes = Quiz::where('subject_id', $subjectId)->get();
        $score = 0;

        foreach ($quizzes as $quiz) {
            $answer = $request->input('answers.' . $quiz->id);
            if ($answer === $quiz->correct_answer) {
                $score += 10;
            }
        }

        // Cegah submit ulang
        if (Score::where('user_id', auth()->id())
            ->where('subject_id', $subjectId)
            ->exists()) {

            return redirect()->route('quiz.index')
                ->with('error', 'Kuis sudah pernah dikerjakan.');
        }

        Score::create([
            'user_id' => auth()->id(),
            'subject_id' => $subjectId,
            'score' => $score,
        ]);

          // ✅ Redirect ke quiz.index jika berhasil
        return redirect()->route('quiz.index')
            ->with('success', 'Kuis berhasil disubmit. Nilai kamu: ' . $score);
    }


    // MANAJEMEN QUIZE
    

}
