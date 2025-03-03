<?php

//use auth;
use App\Models\material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\SendEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HpsController;
use App\Http\Controllers\AhspController;
use App\Http\Controllers\CityController;
//use App\Http\Controllers\PostController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\upahController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\materialController;
use App\Http\Controllers\RegisterController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');


Route::get('/main', function () {
    return view('main');
});

Route::get('/profil', function () {
    return view('profil');
});

Route::get('/new-hps', function () {
    return view('newhps');
});

Route::get('/pekerjaan', function () {
    return view('ahsp.pekerjaan');
});


Route::get('/hps-real', function () {
    return view('hpsreal');
});

Route::get('/save-hps', function () {
    return view('savehps');
});

Route::get('/preview-hps', function () {
    return view('previewhps');
});


Route::get('/newhps', function () {
    return view('newhps');
});

// Route resource
//Route::resource('/posts', \App\Http\Controllers\PostController::class)->middleware('auth');
Route::resource('/alat', \App\Http\Controllers\alatController::class)->middleware('auth');
Route::put('/alat/{id}', [\App\Http\Controllers\alatController::class, 'update'])->middleware('auth');
Route::get('/alat/search', [\App\Http\Controllers\alatController::class, 'search'])->name('alat.search')->middleware('auth');
Route::resource('/upah', App\Http\Controllers\upahController::class)->middleware('auth');
Route::put('/upah/{id}', [upahController::class, 'update'])->middleware('auth');
Route::get('/upah/search', [upahController::class, 'search'])->middleware('auth');
Route::resource('/material', \App\Http\Controllers\materialController::class)->middleware('auth');
Route::get('/input-ahs', [AhspController::class, 'create'])->name('input-ahs');
Route::get('/create-hps', [AhspController::class, 'createHps'])->name('create-hps');

// Login routes
Route::get('/login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'actionlogin'])->name('actionlogin')->middleware('guest');

// Main route
Route::get('/main', [MainController::class, 'index'])->name('main')->middleware('auth');

// Logout route
Route::get('/actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');


// Register routes
//verifikasi email user
Route::middleware(['auth:sanctum', 'verified'])->get('/main', function () {
    return view('main');
})->name('main');

Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/register', [RegisterController::class, 'actionregister'])->name('actionregister');
Route::get('/email/verify', function(){
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request){
    $request->fulfill();
    
    return redirect('/profile');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/profile', function() {
    return 'ini halaman profile ceritanya';
})->middleware(['auth', 'verified']);

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
// Profile
Route::middleware(['auth:sanctum', 'verified'])->get('/profile', function () {
    return view('profile.show');
})->name('profile.show');

//Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
Route::patch('/profile/{id_user}', [ProfileController::class, 'update'])->name('profile.update');

Route::get('/alat/{keyword}', 'AlatController@show')->name('alat.index');

// AHSP
Route::get('/ahsp/{ahsp}/edit', [AhspController::class, 'edit'])->name('ahsp.edit');
Route::get('send-email', [SendEmail::class, 'index']);


//belajar export data excel
Route::get('/cities', [CityController::class, 'index']);
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//Route::get('/create-hps', [AhspController::class, 'createHps']);
//Route::get('/materials', [AhspController::class, 'index']);
Route::get('/materials/{id}', [AhspController::class, 'showMaterial']);
Route::get('/alats/{id}', [AhspController::class, 'showAlat']);
Route::get('/upahs/{id}', [AhspController::class, 'showUpah']);
Route::get('/export-pdf', [AhspController::class, 'exportPdf']);
Route::get('/view-pdf', [AhspController::class, 'view_pdf']);

Route::get('/create/hps', [AhspController::class, 'indexHps'])->name('ahsp.createhps');

Route::get('/testform', [AhspController::class, 'formtest'])->name('ahsp.formtest');
Route::get('/pekerjaan/{pekerjaanId}', [AhspController::class, 'getPekerjaan']);

Route::get('/pekerjaanhps/create', [AhspController::class, 'createPekerjaanHps'])->name('ahsp.pekerjaanhps'); // Menampilkan form
Route::post('/pekerjaanhps/store', [AhspController::class, 'storePekerjaanHps'])->name('pekerjaanhps.storePekerjaanHps'); // Menyimpan data


Route::get('/rincian/create/{pekerjaan_id}', [AhspController::class, 'createRincianPekerjaanHps'])->name('ahsp.rincianpekerjaanhps');
Route::post('/rincian', [AhspController::class, 'storeRincianPekerjaanHps'])->name('rincianpekerjaanhps.storeRincianPekerjaanHps');


Route::get('/pekerjaans/{id}', [AhspController::class, 'showPekerjaan']);
Route::get('/rincianpekerjaans/{id}', [AhspController::class, 'showRincianPekerjaan']);
Route::post('/formtest/store', [AhspController::class, 'store'])->name('ahsp.store');


Route::post('/pekerjaan/store', [AhspController::class, 'storepekerjaan'])->name('ahsp.pekerjaan');
Route::post('/rincian-pekerjaan/store', [AhspController::class, 'storerincianpekerjaan'])->name('ahsp.rincianpekerjaan');
Route::get('ahsp/create', [AhspController::class, 'create'])->name('ahsp.create');

//HPS
Route::get('/hps/form', [HpsController::class, 'showForm'])->name('hps.form');
//Route::post('/hps/store', [HpsController::class, 'simpanData'])->name('hps.form');
Route::post('/simpan-data', [HpsController::class, 'simpanData'])->name('simpanData');