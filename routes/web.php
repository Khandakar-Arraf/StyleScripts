<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CustomDesignController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\PurchaseRequestController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/get-catalogs/{id}', [CustomDesignController::class, 'getcatalog'])->name('getcatalog');
Route::get('/mail', function () {
});

Route::get('/', [PublicController::class, 'index'])->name('index');
Route::get('/Complete-Profile-202', [PublicController::class, 'cp'])->name('cp');
Route::get('/not-allowed', [PublicController::class, 'na'])->name('na');

Route::get('/complete-profile', [PublicController::class, 'completeprofile'])->name('profile.complete');
Route::get('/blog/{blogId}', [PublicController::class, 'blogDetails'])->name('blog.details');
Route::get('/blogs', [PublicController::class, 'blogs'])->name('blogs.all');
Route::get('/courses/all', [PublicController::class, 'courses'])->name('course.all');
Route::get('/course/details/{course}', [PublicController::class, 'coursedetails'])->name('course.details');
Route::get('/products/all', [PublicController::class, 'products'])->name('product.all');
Route::get('/product/details/{product}', [PublicController::class, 'productdetails'])->name('product.details');
Route::get('/instructors/all', [PublicController::class, 'instructors'])->name('instructor.all');
Route::get('/instructor/courses/{instructor}', [PublicController::class, 'instructordetails'])->name('instructor.details');
Route::get('/subjects/all', [PublicController::class, 'subjects'])->name('subject.all');
Route::get('/subject/courses/{subject}', [PublicController::class, 'subjectdetails'])->name('subject.details');

Route::post('/filter', [SearchController::class, 'filter'])->name('filter');
Route::post('/search', [SearchController::class, 'search'])->name('search'); //  search
Route::get('/search/view', [SearchController::class, 'result'])->name('result'); // show search

Route::get('/custom-design', [PublicController::class, 'customDesign'])->name('custom-design');

Route::middleware('auth')->group(function () {
    Route::post('/sent-purchase-request', [PurchaseRequestController::class, 'store'])->name('design.store');
    Route::get('/custom-design/{id}', [PublicController::class, 'customDesignDetails'])->name('custom-design.details');
    Route::post('/comment', [CommentsController::class, 'store'])->name('comment.store');

    Route::post('store/customer-info', [CustomerController::class, 'store'])->name('customer.store');
    Route::post('store/instructor-info', [InstructorController::class, 'store'])->name('instructor.store');
});

Route::prefix('/user/dashboard')->middleware(['auth', 'checkProfile'])->group(function () {
    Route::get('/Profile', [PublicController::class, 'userdashboard'])->name('user.dashboard');
    Route::get('/attendance', [PublicController::class, 'attendance'])->name('attendance.index');
    Route::post('/attendance/store', [AttendanceController::class, 'store'])->name('attendance.store');

    Route::post('update/instructor/{user}', [UserController::class, 'instructor'])->name('instructor.update');
    Route::post('update/customer/{user}', [UserController::class, 'customer'])->name('customer.update');
    Route::post('update/user/{user}', [UserController::class, 'update'])->name('user.update');
});
Route::prefix('/user/dashboard')->middleware(['auth', 'checkProfile'])->group(function () {

    Route::get('checkout/{item}/{type}', [PublicController::class, 'checkout'])->name('checkout.store');
    Route::post('order/store', [OrderController::class, 'store'])->name('order.store');

    Route::get('/', [CourseController::class, 'index'])->name('user.courses.index');
    Route::get('/my-courses', [CourseController::class, 'courses'])->name('user.courses.customer');
    Route::get('/create-course', [PublicController::class, 'createcourse'])->name('user.course.create');

    Route::get('/update-course', [PublicController::class, 'updatecourse'])->name('user.course.update');
    Route::get('/sales', [PublicController::class, 'sales'])->name('user.sales');
    Route::get('/purchase', [PublicController::class, 'purchase'])->name('user.purchase');
});
Route::prefix('chat/inbox')->middleware(['auth', 'checkProfile'])->group(function () {

    Route::get('/instructor', [InstructorController::class, 'inbox'])->name('chat.inbox.instructor');
    Route::get('/customer', [CustomerController::class, 'inbox'])->name('chat.inbox.customer');
    Route::get('instructor/course/{course}', [CustomerController::class, 'chat'])->name('chat.show.customer');
    Route::get('customer/course/{course}', [InstructorController::class, 'chat'])->name('chat.show.instructor');


    Route::post('/', [ChatController::class, 'store'])->name('chat.save');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');