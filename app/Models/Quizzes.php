<?php

namespace App\Models;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quizzes extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function quizeIndex()
    {
        $quizzes = Quiz::with('subject')->latest()->get();
        return view('guru.quiz.index', compact('quizzes'));
    }

}
