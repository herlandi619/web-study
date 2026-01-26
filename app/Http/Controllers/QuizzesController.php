<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Quizzes;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class QuizzesController extends Controller
{
    public function quizIndex(Request $request)
    {
        $subjects = Subject::all();

        $quizzes = Quiz::with('subject')
            ->when($request->subject_id, function ($query) use ($request) {
                $query->where('subject_id', $request->subject_id);
            })
            ->latest()
            ->paginate(10)
            ->withQueryString(); // ⬅ penting agar filter ikut pagination

        return view('guru.quiz.index', compact('quizzes', 'subjects'));
    }

    public function quizDestroy(Quizzes $quiz)
    {
        $quiz->delete();

        return redirect()
            ->route('guru.quiz.index')
            ->with('success', 'Quiz berhasil dihapus');
    }

    public function quizCreate()
    {
        $subjects = Subject::all();

        return view('guru.quiz.create', compact('subjects'));
    }

    public function quizStore(Request $request)
    {
        $request->validate([
            'subject_id' => 'required|exists:subjects,id',
            'question'   => 'required',
            'option_a'   => 'required',
            'option_b'   => 'required',
            'option_c'   => 'required',
            'option_d'   => 'required',
            'correct_answer' => 'required|in:A,B,C,D',
        ]);

        Quiz::create([
            'subject_id' => $request->subject_id,
            'question'   => $request->question,
            'option_a'   => $request->option_a,
            'option_b'   => $request->option_b,
            'option_c'   => $request->option_c,
            'option_d'   => $request->option_d,
            'correct_answer' => $request->correct_answer,
        ]);

        return redirect()
            ->route('guru.quiz.index')
            ->with('success', 'Quiz berhasil ditambahkan');
    }

    public function quizEdit(Quizzes $quiz)
    {
        $subjects = Subject::all();

        return view('guru.quiz.edit', compact('quiz', 'subjects'));
    }

    public function quizUpdate(Request $request, Quizzes $quiz)
    {
        $request->validate([
            'subject_id'     => 'required|exists:subjects,id',
            'question'       => 'required|string',
            'correct_answer' => 'required|string|max:255',
        ]);

        $quiz->update([
            'subject_id'     => $request->subject_id,
            'question'       => $request->question,
            'correct_answer' => $request->correct_answer,
        ]);

        return redirect()
            ->route('guru.quiz.index', ['subject_id' => $request->subject_id])
            ->with('success', 'Quiz berhasil diperbarui');
    }






}
