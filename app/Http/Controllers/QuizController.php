<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
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

    // SUBMIT: hitung nilai
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

        return view('quizzes.result', compact('score'));
    }
}
