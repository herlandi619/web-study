<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\QuizzesController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboardGuru', function () {
    return view('dashboardGuru');
})->middleware(['auth', 'verified'])->name('dashboard.guru');

Route::get('/dashboardAdmin', function () {
    return view('dashboardAdmin');
})->middleware(['auth', 'verified'])->name('dashboard.admin');

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


    // SUBJECT INDEX
    Route::get('/guru/subject/index', [MaterialController::class, 'subjectindex'])
        ->name('guru.subject.index');

    Route::get('/guru/subject/create', [MaterialController::class, 'subjectCreate'])
        ->name('guru.subject.create');

    Route::post('/guru/subject', [MaterialController::class, 'subjectStore'])
        ->name('guru.subject.store');

    Route::get('/guru/subject/{subject}/edit', [MaterialController::class, 'subjectEdit'])
        ->name('guru.subject.edit');

    Route::put('/guru/subject/{subject}', [MaterialController::class, 'subjectUpdate'])
        ->name('guru.subject.update');


    Route::delete('/guru/subject/{id}', [MaterialController::class, 'subjectDestroy'])
        ->name('guru.subject.destroy');


    // MANAJEMEN QUIZEE
    Route::get('/guru/quiz/index', [QuizzesController::class, 'quizIndex'])
        ->name('guru.quiz.index');

    Route::delete('/guru/quiz/{quiz}', [QuizzesController::class, 'quizDestroy'])
        ->name('guru.quiz.destroy');

    Route::get('/guru/quiz/create', [QuizzesController::class, 'quizCreate'])
    ->name('guru.quiz.create');

    Route::post('/guru/quiz', [QuizzesController::class, 'quizStore'])
    ->name('guru.quiz.store');

    Route::get('/guru/quiz/{quiz}/edit', [QuizzesController::class, 'quizEdit'])
    ->name('guru.quiz.edit');

    Route::put('/guru/quiz/{quiz}', [QuizzesController::class, 'quizUpdate'])
        ->name('guru.quiz.update');


    // ADMIN 
    // manajemen user
    Route::get('/admin/users', [UserController::class, 'adminIndex'])
        ->name('admin.users.index');

    Route::get('/admin/users/create', [UserController::class, 'adminCreate'])
    ->name('admin.users.create');

    Route::post('/admin/users', [UserController::class, 'adminStore'])
    ->name('admin.users.store');

    Route::delete('/admin/users/{user}', [UserController::class, 'adminDestroy'])
    ->name('admin.users.destroy');

    Route::get('/admin/users/{user}/edit', [UserController::class, 'adminEdit'])
    ->name('admin.users.edit');

    Route::put('/admin/users/{id}', [UserController::class, 'adminUpdate'])
    ->name('admin.users.update');
    


});

require __DIR__.'/auth.php';
