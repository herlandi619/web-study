<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Score;

class StudentController extends Controller
{
    
    public function index()
    {
        $students = User::where('role', 'siswa')
                        ->orderBy('name', 'asc')
                        ->paginate(10);

        return view('guru.siswa.index', compact('students'));
    }

    public function show($id)
    {
        $student = User::where('role', 'siswa')->findOrFail($id);

        $scores = Score::where('user_id', $student->id)
                        ->orderBy('created_at', 'desc')
                        ->get();

        return view('guru.siswa.show', compact('student', 'scores'));
    }



}
