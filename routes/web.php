<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\MaterialController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboardGuru', function () {
    return view('dashboardGuru');
})->middleware(['auth', 'verified'])->name('dashboard.guru');

Route::middleware('auth')->group(function () {

    // Materi (siswa)
    Route::get('/materi', [MaterialController::class, 'index'])->name('materi.index');
    Route::get('/materi/{id}', [MaterialController::class, 'show'])->name('materi.show');

    

    // authentikasi
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    // quiz (siswa) 
    
    Route::get('/kuis', [QuizController::class, 'index'])->name('quiz.index');
    Route::get('/kuis/{subject}', [QuizController::class, 'start'])->name('quiz.start');
    Route::post('/kuis/{subject}/submit', [QuizController::class, 'submit'])->name('quiz.submit');


    //score (siswa)
    Route::get('/hasil-belajar', [ScoreController::class, 'index'])->name('score.index');

    //GURU
    Route::get('/guru/siswa', [StudentController::class, 'index'])->name('student.index');
    Route::get('/guru/siswa/{id}', [StudentController::class, 'show'])->name('student.show');

    // materi (guru)

    Route::get('/guru/materi', [MaterialController::class, 'materiIndex'])
        ->name('guru.materi.index');

    Route::get('/guru/materi/create', [MaterialController::class, 'materiCreate'])
        ->name('guru.materi.create');

    Route::post('/guru/materi', [MaterialController::class, 'materiStore'])
        ->name('guru.materi.store');

    // Route::get('/guru/materi/{id}', [MateriController::class, 'show'])
    //     ->name('materi.show');

    Route::get('/guru/materi/{id}/edit', [MaterialController::class, 'materiEdit'])
        ->name('guru.materi.edit');

    Route::put('/guru/materi/{id}', [MaterialController::class, 'materiUpdate'])
        ->name('guru.materi.update');

    Route::delete('/guru/materi/{id}', [MaterialController::class, 'materiDestroy'])
        ->name('guru.materi.destroy');



});

require __DIR__.'/auth.php';
