<?php

use App\Http\Controllers\AdminDashboradController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\StudentDashboradController;

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


// Route::get('/dashborad',[AdminDashboradController::class,'index']);

Route::get('/demo', function () {
    return view('demo');
})->name('demo');


// Route::get('/student/my_profile', function () {
//     return view('Student.my_profile');
// })->name('my-profile');


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


Route::get('/login', [LoginController::class,'login'])->name('login.show');
Route::post('/login-submit', [LoginController::class,'login'])->name('login.submit');


// =================== Student dashboade routes ==========================================
// Route::middleware('auth:student')->group(function () {
//     Route::get('/student/dashboard',[AdminDashboradController::class,'index'])->name('student.dashboard');
// });

// Route::get('/student/dashboard',[StudentDashboradController::class,'index'])->name('student.dashboard');

// Route::get('/student/my_profile', function () {
//     return view('Student.my_profile');
// })->name('my-profile');

// Route::get('/student/all_courses', function () {
//     return view('Student.all_courses');
// })->name('all-courses');

// Route::get('/student/my_courses', function () {
//     return view('Student.my_coures');
// })->name('my-courses');

// Route::get('/student/course_material', function () {
//     return view('Student.courses_material');
// })->name('course-material');

// Route::get('/student/course_module', function () {
//     return view('Student.course_module');
// })->name('course-module');

// Route::get('/student/batches', function () {
//     return view('Student.batches');
// })->name('batches');


// Route::get('/student/payments', function () {
//     return view('Student.payments');
// })->name('payments');


// Route::get('/student/queries', function () {
//     return view('Student.queries');
// })->name('queries');

// Route::get('/student/certificate', function () {
//     return view('Student.certificate');
// })->name('certificate');

// Route::get('/student/settings', function () {
//     return view('Student.settings');
// })->name('settings');


// Route::get('/student/all_courses_details', function () {
//     return view('Student.all_courses_details');
// })->name('all-courses-details');


Route::middleware('auth:student')->group(function () {

    Route::get('/student/dashboard',
        [StudentDashboradController::class,'index']
    )->name('student.dashboard');

    Route::get('/student/my_profile', fn () => view('Student.my_profile'))->name('my-profile');
    Route::get('/student/all_courses', fn () => view('Student.all_courses'))->name('all-courses');
    Route::get('/student/my_courses', fn () => view('Student.my_coures'))->name('my-courses');
    Route::get('/student/course_material', fn () => view('Student.courses_material'))->name('course-material');
    Route::get('/student/batches', fn () => view('Student.batches'))->name('batches');
    Route::get('/student/payments', fn () => view('Student.payments'))->name('payments');
    Route::get('/student/queries', fn () => view('Student.queries'))->name('queries');
    Route::get('/student/certificate', fn () => view('Student.certificate'))->name('certificate');
    Route::get('/student/settings', fn () => view('Student.settings'))->name('settings');

});
