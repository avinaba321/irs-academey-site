<?php

use App\Http\Controllers\Admin\AdminBatchesController;
use App\Http\Controllers\Admin\AdminCourseController;
use App\Http\Controllers\AdminDashboradController;
use App\Http\Controllers\AllCourseController;
use App\Http\Controllers\Student\MyProfileDetailsController;
use App\Http\Controllers\Student\StudentPaymentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Student\AllStudentCourseController;
use App\Http\Controllers\Student\StudentDashboradController;
use App\Http\Controllers\Student\StudentPaymentDetailsContoller;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', function () {
    return view('Home.home');
})->name('home');

Route::get('/about', function () {
    return view('About.about');
})->name('about');

Route::get('/view-all-courses', [AllCourseController::class,'index'])->name('courses');

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

// Route::middleware(['auth:admin','guard.access:admin','admin.ids'])->group(function () {
//     Route::get('/admin/dashboard', fn () => view('Admin.dashboard'))
//         ->name('admin.dashboard');
// });

Route::middleware('auth:teacher')->group(function () {
    Route::get('/teacher/dashboard', fn () => view('teacher.dashboard'))
        ->name('teacher.dashboard');
});


// Route::get('/login', [LoginController::class,'login'])->name('login');
Route::get('/login-redirect', function () {
    return redirect()->route('home')->with('show_login_modal', true);
})->name('login');

Route::post('/logout', [LoginController::class,'logout'])->name('logout.user');
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


Route::middleware(['auth:student','guard.access:student'])->group(function () {

    Route::get('/student/dashboard',[StudentDashboradController::class,'index'])->name('student.dashboard');

    Route::get('/student/my_profile', [MyProfileDetailsController::class,'profileIndex'])->name('my-profile');
     Route::patch('/student/profile/update', [MyProfileDetailsController::class, 'update'])->name('student.profile.update');
    Route::post('/student/profile/avatar', [MyProfileDetailsController::class, 'updateAvatar'])->name('student.profile.avatar.update');
     Route::post('/student/change-password', [MyProfileDetailsController::class, 'updatePassword'])->name('student.password.update');
     

    // Route::get('/student/all_courses', fn () => view('Student.all_courses'))->name('all-courses');

    Route::get('/student/all_courses', [AllStudentCourseController::class, 'index'])->name('all-courses');
     Route::get('/student/payments', [StudentPaymentDetailsContoller::class,'myPayments'])->name('payments');

    Route::get('/student/my_courses', fn () => view('Student.my_coures'))->name('my-courses');
    Route::get('/student/course_material', fn () => view('Student.courses_material'))->name('course-material');
    Route::get('/student/batches', fn () => view('Student.batches'))->name('batches');
    // Route::get('/student/payments', fn () => view('Student.payments'))->name('payments');
     Route::get('/student/queries', fn () => view('Student.queries'))->name('queries');
    Route::get('/student/certificate', fn () => view('Student.certificate'))->name('certificate');
    Route::get('/student/settings', fn () => view('Student.settings'))->name('settings');

    // payment selection
Route::post('/student/payment/initiate', 
    [StudentPaymentController::class, 'initiate']
)->name('student.payment.initiate');

// razorpay callback
Route::post('/student/payment/verify', 
    [StudentPaymentController::class, 'verify']
)->name('student.payment.verify');

Route::post('/student/payment/fail',
    [StudentPaymentController::class, 'fail']
)->name('student.payment.fail');

 Route::get('/my-payments', [StudentPaymentDetailsContoller::class, 'myPayments'])
        ->name('student.payments');

 Route::get(
    '/student/invoice/{installment}',
    [StudentPaymentDetailsContoller::class, 'downloadInvoice']
)->name('student.invoice.download');


});


// =================== Admin dashboade routes ==========================================

Route::middleware(['auth:admin','guard.access:admin','admin.ids'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboradController::class,'index'])->name('admin.dashboard');
    Route::get('/admin/courses', [AdminCourseController::class,'coursesIndex'])->name('admin-courses');
    Route::post('/admin/courses/store', [AdminCourseController::class, 'store'])->name('admin.courses.store');
    Route::delete('/admin/courses/{course}',[AdminCourseController::class, 'destroy'])->name('admin.courses.destroy');
    Route::patch('/admin/courses/{course}/status',[AdminCourseController::class, 'toggleStatus'])->name('admin.courses.status');
    Route::put('/admin/courses/{course}', [AdminCourseController::class, 'update'])->name('admin.courses.update');
    Route::get('/admin/batches/batches-list', [AdminBatchesController::class, 'indexBatch'])->name('admin.batches.list');
    Route::get('/admin/batches/batches-details', [AdminBatchesController::class, 'indexBatchDetails'])->name('admin.batches.details');
    Route::post('/admin/batches/store', [AdminBatchesController::class, 'store'])->name('admin.batches.store');
     Route::put('/admin/batches/{id}/update', [AdminBatchesController::class, 'update'])->name('admin.batches.update');
     Route::delete('/admin/batches/{id}/delete', [AdminBatchesController::class, 'destroy'])
        ->name('admin.batches.destroy');
    Route::get('/admin/batches/filter', [AdminBatchesController::class, 'filter'])
    ->name('admin.batches.filter');

    
});

// Route::get('/admin/courses', fn () => view('Admin.courses'))->name('admin-courses');
