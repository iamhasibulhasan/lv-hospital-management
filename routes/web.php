<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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
//Main Route
Route::get('/', [HomeController::class, 'index'])->name('index');

//Regular User Routes
Route::get('/home', [HomeController::class, 'redirect'])->middleware('auth', 'verified')->name('home');
Route::post('/appointment-store', [HomeController::class, 'appointmentStore'])->name('appointment.store');
Route::get('/home/appointment', [HomeController::class, 'myAppointment'])->name('home.appointment');
Route::get('/appointment-destroy/{id}', [HomeController::class, 'appointmentDestroy'])->name('appointment.destroy');
Route::get('/about-us', [HomeController::class, 'aboutUs'])->name('user.aboutus');
Route::get('/our-doctors', [HomeController::class, 'ourDoctors'])->name('user.ourdoctors');
Route::get('/contact', [HomeController::class, 'contact'])->name('user.contact');
Route::get('/news', [HomeController::class, 'news'])->name('user.news');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//Admin Route
Route::get('/add-doctor', [AdminController::class, 'addDoctors'])->name('add.doctor');
Route::post('/doctor-store', [AdminController::class, 'store'])->name('doctor.store');
Route::get('/doctor-destroy/{id}', [AdminController::class, 'destroy'])->name('doctor.destroy');
Route::get('/doctor-edit/{id}', [AdminController::class, 'edit'])->name('doctor.edit');
Route::post('/doctor-update', [AdminController::class, 'update'])->name('doctor.update');
Route::get('/doctor-appointment', [AdminController::class, 'doctorAppointment'])->name('doctor.appointments');
Route::get('/appointment-accept/{id}', [AdminController::class, 'appointmentAccept'])->name('appointment.accept');
Route::get('/appointment-reject/{id}', [AdminController::class, 'appointmentReject'])->name('appointment.reject');
