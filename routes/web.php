<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MaterialController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    // Materi
    Route::get('/materi', [MaterialController::class, 'index'])->name('materi.index');
    Route::get('/materi/{id}', [MaterialController::class, 'show'])->name('materi.show');


    // authentikasi
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    // quiz 
    
    Route::get('/kuis', [QuizController::class, 'index'])->name('quiz.index');
    Route::get('/kuis/{subject}', [QuizController::class, 'start'])->name('quiz.start');
    Route::post('/kuis/{subject}/submit', [QuizController::class, 'submit'])->name('quiz.submit');


    //score
    Route::get('/hasil-belajar', [ScoreController::class, 'index'])->name('score.index');



});

require __DIR__.'/auth.php';
