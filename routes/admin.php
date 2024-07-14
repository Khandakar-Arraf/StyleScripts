<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CustomDesignColorsController;
use App\Http\Controllers\CustomDesignController;
use App\Http\Controllers\CustomDesignIconsController;
use App\Http\Controllers\DurationController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\PurchaseRequestController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
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
Route::prefix('/dashboard')->middleware('auth')->group(function () {
    Route::get('admin/profile', [UserController::class, 'adminIndex'])->name('dashboard.profile.index');
    Route::put('admin/profile/update/{id}', [UserController::class, 'adminUpdate'])->name('dashboard.profile.update');

    Route::get('/sale/invoice/{transactionId}', [TransactionController::class, 'invoice'])->name('generate.invoice');
    Route::get('/sale/view/{transactionId}', [TransactionController::class, 'view'])->name('generate.view');


    Route::get('/', [PublicController::class, 'dashboard'])->name('dashboard.index');



    Route::prefix('courses')->group(function () {
        // Hero-Routes
        Route::get('/', [CourseController::class, 'index'])->name('courses.index');
        Route::get('/create', [CourseController::class, 'create'])->name('courses.create');
        Route::post('/', [CourseController::class, 'store'])->name('courses.store');
        Route::get('/course_list', [CourseController::class, 'show'])->name('courses.show'); // course list
        Route::get('/course_list/add/{id}', [CourseController::class, 'add'])->name('courses.add'); // add order
        Route::get('/course_list/order', [CourseController::class, 'order'])->name('courses.order'); // show order
        Route::get('/{course}/edit', [CourseController::class, 'edit'])->name('courses.edit');
        Route::get('/{course}/archive', [CourseController::class, 'archive'])->name('courses.archive');
        Route::post('/{course}', [CourseController::class, 'update'])->name('courses.update');
        Route::get('/{course}', [CourseController::class, 'destroy'])->name('courses.destroy');
        Route::get('/active/{course}', [CourseController::class, 'active'])->name('courses.active');
        Route::get('/inactive/{course}', [CourseController::class, 'inactive'])->name('courses.inactive');
    });


    Route::prefix('categories')->group(function () {
        // Hero-Routes
        Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('/', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('/{category}', [CategoryController::class, 'show'])->name('categories.show');
        Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::put('/{category}', [CategoryController::class, 'update'])->name('categories.update');
        Route::get('/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
        Route::get('/active/{category}', [CategoryController::class, 'active'])->name('categories.active');
        Route::get('/inactive/{category}', [CategoryController::class, 'inactive'])->name('categories.inactive');
    });

    Route::prefix('subjects')->group(function () {
        // Hero-Routes
        Route::get('/', [SubjectController::class, 'index'])->name('subjects.index');
        Route::get('/create', [SubjectController::class, 'create'])->name('subjects.create');
        Route::post('/', [SubjectController::class, 'store'])->name('subjects.store');
        Route::get('/{subject}', [SubjectController::class, 'show'])->name('subjects.show');
        Route::get('/{subject}/edit', [SubjectController::class, 'edit'])->name('subjects.edit');
        Route::put('/{subject}', [SubjectController::class, 'update'])->name('subjects.update');
        Route::get('/{subject}', [SubjectController::class, 'destroy'])->name('subjects.destroy');
        Route::get('/active/{subject}', [SubjectController::class, 'active'])->name('subjects.active');
        Route::get('/inactive/{subject}', [SubjectController::class, 'inactive'])->name('subjects.inactive');
    });


    Route::prefix('durations')->group(function () {
        // duration-Routes
        Route::get('/', [DurationController::class, 'index'])->name('durations.index');
        Route::post('/', [DurationController::class, 'store'])->name('durations.store');
        Route::get('/{duration}/edit', [DurationController::class, 'edit'])->name('durations.edit');
        Route::put('/{duration}', [DurationController::class, 'update'])->name('durations.update');
        Route::get('/{duration}', [DurationController::class, 'destroy'])->name('durations.destroy');
        Route::get('/active/{duration}', [DurationController::class, 'active'])->name('durations.active');
        Route::get('/inactive/{duration}', [DurationController::class, 'inactive'])->name('durations.inactive');
    });


    Route::prefix('blogs')->group(function () {
        // Blog-Routes
        Route::get('/', [BlogController::class, 'index'])->name('blogs.index');
        Route::get('/create', [BlogController::class, 'create'])->name('blogs.create');
        Route::post('/', [BlogController::class, 'store'])->name('blogs.store');
        Route::get('/{blog}', [BlogController::class, 'show'])->name('blogs.show');
        Route::get('/{blog}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
        Route::put('/{blog}', [BlogController::class, 'update'])->name('blogs.update');
        Route::get('/{blog}', [BlogController::class, 'destroy'])->name('blogs.destroy');
        Route::get('/active/{blog}', [BlogController::class, 'active'])->name('blogs.active');
        Route::get('/inactive/{blog}', [BlogController::class, 'inactive'])->name('blogs.inactive');
    });

    Route::prefix('custom_designs')->group(function () {
        // Blog-Routes
        Route::get('/purchase-requests', [PurchaseRequestController::class, 'index'])->name('purchase_request.list');
        Route::get('/purchase-requests/delete', [PurchaseRequestController::class, 'destroy'])->name('purchase_request.delete');
        Route::get('/', [CustomDesignController::class, 'index'])->name('custom_designs.index');
        Route::get('/create', [CustomDesignController::class, 'create'])->name('custom_designs.create');
        Route::post('/', [CustomDesignController::class, 'store'])->name('custom_designs.store');
        Route::get('view//{custom_design}', [CustomDesignController::class, 'show'])->name('custom_designs.view');
        Route::get('edit/{custom_design}/edit', [CustomDesignController::class, 'edit'])->name('custom_designs.edit');
        Route::put('update/{custom_design}', [CustomDesignController::class, 'update'])->name('custom_designs.update');
        Route::get('delete/{custom_design}', [CustomDesignController::class, 'destroy'])->name('custom_designs.destroy');
        Route::get('/active/{custom_design}', [CustomDesignController::class, 'active'])->name('custom_designs.active');
        Route::get('/inactive/{custom_design}', [CustomDesignController::class, 'inactive'])->name('custom_designs.inactive');
    });
    Route::prefix('custom_design_icons')->group(function () {
        // custom_design_icons-Routes
        Route::get('/', [CustomDesignIconsController::class, 'index'])->name('custom_design_icons.index');
        Route::post('/', [CustomDesignIconsController::class, 'store'])->name('custom_design_icons.store');
        Route::get('/{custom_design_icons}/edit', [CustomDesignIconsController::class, 'edit'])->name('custom_design_icons.edit');
        Route::post('/{custom_design_icons}', [CustomDesignIconsController::class, 'update'])->name('custom_design_icons.update');
        Route::get('/{custom_design_icons}', [CustomDesignIconsController::class, 'destroy'])->name('custom_design_icons.destroy');
    });
    Route::prefix('custom_design_colors')->group(function () {
        // custom_design_colors-Routes
        Route::get('/', [CustomDesignColorsController::class, 'index'])->name('custom_design_colors.index');
        Route::post('/', [CustomDesignColorsController::class, 'store'])->name('custom_design_colors.store');
        Route::get('/{custom_design_colors}/edit', [CustomDesignColorsController::class, 'edit'])->name('custom_design_colors.edit');
        Route::post('/{custom_design_colors}', [CustomDesignColorsController::class, 'update'])->name('custom_design_colors.update');
        Route::get('/{custom_design_colors}', [CustomDesignColorsController::class, 'destroy'])->name('custom_design_colors.destroy');
    });
    Route::prefix('purchase_requests')->group(function () {
        // Blog-Routes
        Route::get('/', [PurchaseRequestController::class, 'index'])->name('purchase_requests.index');
        Route::post('/delete/{purchaseRequest}', [PurchaseRequestController::class, 'destroy'])->name('purchase_requests.destroy');

    });
    Route::prefix('attendances')->group(function () {
        // attendance-Routes
        Route::get('/', [AttendanceController::class, 'index'])->name('attendances.index');
        Route::get('/create', [AttendanceController::class, 'create'])->name('attendances.create');
        Route::post('/', [AttendanceController::class, 'store'])->name('attendances.store');
        Route::get('/{attendance}', [AttendanceController::class, 'show'])->name('attendances.show');
        Route::get('/{attendance}/edit', [AttendanceController::class, 'edit'])->name('attendances.edit');
        Route::put('/{attendance}', [AttendanceController::class, 'update'])->name('attendances.update');
        Route::get('/{attendance}', [AttendanceController::class, 'destroy'])->name('attendances.destroy');
        Route::get('/active/{attendance}', [AttendanceController::class, 'active'])->name('attendances.active');
        Route::get('/inactive/{attendance}', [AttendanceController::class, 'inactive'])->name('attendances.inactive');
    });


    Route::prefix('products')->group(function () {
        // product-Routes
        Route::get('/', [ProductController::class, 'index'])->name('products.index');
        Route::get('/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/', [ProductController::class, 'store'])->name('products.store');
        Route::get('/{product}', [ProductController::class, 'show'])->name('products.show');
        Route::get('/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('/{product}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
        Route::get('/active/{product}', [ProductController::class, 'active'])->name('products.active');
        Route::get('/inactive/{product}', [ProductController::class, 'inactive'])->name('products.inactive');
    });

    Route::prefix('courses')->group(function () {
        // courses-Routes
        Route::get('/', [CourseController::class, 'course'])->name('courses.all');
        // Route::get('/{courses}', [CourseController::class, 'show'])->name('courses.show');
        // Route::delete('/{courses}', [CourseController::class, 'destroy'])->name('courses.destroy');
        Route::get('/pending/{course}', [CourseController::class, 'pending'])->name('courses.pending');
        Route::get('/active/{course}', [CourseController::class, 'active'])->name('courses.active');
        Route::get('/inactive/{course}', [CourseController::class, 'inactive'])->name('courses.inactive');
    });

    Route::prefix('report')->group(function () {
        // orders-Routes
        Route::get('/Course', [TransactionController::class, 'course'])->name('profit.course.index');
        Route::get('/shop', [TransactionController::class, 'shop'])->name('profit.shop.index');
        Route::get('/sale', [TransactionController::class, 'sale'])->name('profit.sale.index');
        Route::get('/chart', [PublicController::class, 'chart'])->name('profit.chart.index');
    });


    Route::prefix('orders')->group(function () {
        // orders-Routes
        Route::get('/', [OrderController::class, 'index'])->name('orders.index');
        Route::get('/course', [OrderController::class, 'course'])->name('orders.course');
        Route::get('/product', [OrderController::class, 'product'])->name('orders.product');
        // Route::get('/{orders}', [ordersController::class, 'show'])->name('orders.show');
        Route::get('/{orders}', [OrderController::class, 'destroy'])->name('orders.destroy');
        Route::get('transaction/{transaction}', [TransactionController::class, 'destroy'])->name('transaction.destroy');
        Route::get('/pending/{order}', [OrderController::class, 'pending'])->name('orders.pending');
        Route::get('/active/{order}', [OrderController::class, 'active'])->name('orders.active');
        Route::get('/inactive/{order}', [OrderController::class, 'inactive'])->name('orders.inactive');
    });
    Route::prefix('chat')->group(function () {
        // users-Routes
        Route::get('/', [ChatController::class, 'index'])->name('admin.chat.index');
        Route::get('/{courseid}', [ChatController::class, 'chat'])->name('admin.chat.show');
    });
    Route::prefix('users')->group(function () {
        // users-Routes
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::get('/{user}', [UserController::class, 'destroy'])->name('users.destroy');
        Route::get('/confirm/{user}', [UserController::class, 'confirm'])->name('users.confirm');
        Route::get('/customer/list', [UserController::class, 'customerlist'])->name('users.customer');
        Route::get('/instructor/list', [UserController::class, 'instructorlist'])->name('users.instructor');
        Route::get('/customerconfirmation//list', [UserController::class, 'customerconfirmationlist'])->name('users.customer.confirmation');
        Route::get('/instructorconfirmation/list', [UserController::class, 'instructorconfirmationlist'])->name('users.instructor.confirmation');
    });
    Route::prefix('content')->group(function () {
        // Hero-Routes
        Route::get('/about/{content}/edit', [ContentController::class, 'editAbout'])->name('about.edit');
        Route::put('/about/{content}', [ContentController::class, 'updateAbout'])->name('about.update');

        Route::get('/general/{content}/edit', [ContentController::class, 'editGeneral'])->name('general.edit');
        Route::put('/general/{content}', [ContentController::class, 'updateGeneral'])->name('general.update');
        Route::get('/contact/{content}/edit', [ContentController::class, 'editContact'])->name('contact.edit');
        Route::put('/contact/{content}', [ContentController::class, 'updateContact'])->name('contact.update');
    });
});