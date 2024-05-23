<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\VerificationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[HomeController::class,'index']);

Route::get('/home',[HomeController::class,'redirect']);

// Route::middleware(['auth', 'verified'])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

Route::get('/register', [HomeController::class,'register'])->name('register');
Route::post('/register', [HomeController::class,'post_register']);
Route::get('/login', [HomeController::class,'login'])->name('login');
Route::post('/login', [HomeController::class,'loginSubmit'])->name('login.submit');





Route::get('/account',[HomeController::class,'account']);
Route::get('/accountstatement',[HomeController::class,'accountstatement']);
Route::get('/fundtransfer',[HomeController::class,'fundtransfer']);
Route::get('/cancel_appoint/{id}',[HomeController::class,'cancel_appoint']);
Route::get('/balance', [HomeController::class, 'balance']);
Route::get('/fundtransfer', [HomeController::class, 'fundtransfer'])->name('fundtransfer');
Route::post('/transfer', [HomeController::class, 'transfer'])->name('transfer');
Route::get('/discovermore', [HomeController::class, 'discovermore']);
Route::post('/sendfeedback', [HomeController::class, 'sendfeedback'])->name('sendfeedback');
Route::get('/notavailable', [HomeController::class, 'notavailable']);
Route::post('/logout', [HomeController::class, 'logout'])->name('logout');


Route::get('/approve/{id}',[EmployeeController::class,'approve']);
Route::get('/cancel/{id}',[EmployeeController::class,'cancel']);
Route::get('/emailview/{id}',[EmployeeController::class,'emailview']);
Route::post('/sendemail/{id}',[EmployeeController::class,'sendemail']);
Route::get('/employeeprofile',[EmployeeController::class,'employeeprofile']);
Route::get('/updateemployeeprofile',[EmployeeController::class,'updateemployeeprofile']);
Route::post('/editemployeeprofile/{id}',[EmployeeController::class,'editemployeeprofile']);
Route::get('/customerservice', [EmployeeController::class, 'customerservice']);
Route::get('/deposit/{id}', [EmployeeController::class, 'deposit']);
Route::get('/withdraw/{id}', [EmployeeController::class, 'withdraw']);
Route::post('/finaldeposit', [EmployeeController::class, 'finaldeposit'])->name('finaldeposit');
Route::post('/finalwithdraw', [EmployeeController::class, 'finalwithdraw'])->name('finalwithdraw');
Route::get('/customerprofile/{id}', [EmployeeController::class, 'customerprofile']);
Route::get('/updatecustomer/{id}',[EmployeeController::class,'updatecustomer']);
Route::post('/editcustomerprofile/{id}',[EmployeeController::class,'editcustomerprofile']);
Route::get('/deletecustomer/{id}',[EmployeeController::class,'deletecustomer']);
Route::get('/showfeedback',[EmployeeController::class,'showfeedback']);
Route::get('/deletefeedback/{id}',[EmployeeController::class,'deletefeedback']);


Route::post('/save-replay', [FeedbackController::class, 'storeReply'])->name('save-replay');
Route::get('/user-feedback', [FeedbackController::class, 'adminFeedback'])->name('feedback.admin');

Route::get('/user-frontendNotification', [FeedbackController::class, 'frontendNotification'])->name('frontendNotification');

Route::get('/user-notification', [FeedbackController::class, 'adminNotification'])->name('notification');
Route::post('/notifications', [FeedbackController::class, 'store'])->name('notifications.store');

Route::post('/deletefeedback/{id}', [FeedbackController::class, 'delete'])->name('notifications.delete');