<?php

use App\Http\Controllers\AdminDashboradController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', function () {
    return view('Home.home');
})->name('home');

Route::get('/about', function () {
    return view('About.about');
})->name('about');

Route::get('/courses', function () {
    return view('Courses.courses');
})->name('courses');

Route::get('/placement', function () {
    return view('Placement.placement');
})->name('placement');


Route::get('/blogs', function () {
    return view('Blogs.blogs');
})->name('blogs');

Route::get('/gallery', function () {
    return view('Gallery.gallery');
})->name('gallery');

Route::get('/contact', function () {
    return view('Contact.contact');
})->name('contact');

Route::post('/contact-submit', [ContactController::class, 'store'])
    ->name('contact.submit');


Route::get('/dashborad',[AdminDashboradController::class,'index']);

Route::get('/demo', function () {
    return view('demo');
})->name('demo');


// Route::get('/login', function () {
//     return view('Auth.login');
// })->name('login');


// =================== Auth Related Routes =====================================================
Route::post('/register', [RegisterController::class, 'register'])
     ->name('register');

Route::middleware('auth:admin')->group(function () {
    Route::get('/admin/dashboard', fn () => view('admin.dashboard'))
        ->name('admin.dashboard');
});

Route::middleware('auth:teacher')->group(function () {
    Route::get('/teacher/dashboard', fn () => view('teacher.dashboard'))
        ->name('teacher.dashboard');
});

Route::middleware('auth:student')->group(function () {
    Route::get('/student/dashboard', fn () => view('student.dashboard'))
        ->name('student.dashboard');
});


Route::post('/login', [LoginController::class,'login'])->name('login.submit');
