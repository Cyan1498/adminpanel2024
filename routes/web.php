<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect()->route('login');
});


// Auth::routes();
Route::group(['middleware' => 'guest'], function () {
    // si no has iniciado sesión, al acceder a la raíz '/', te redirigirá a la acción index del controlador AuthController
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    
});

Route::resource('users', UserController::class);

// Route::get('/users', [UserController::class, 'index'])->name('users');

Route::middleware('auth')->group(function ()  {
    // Route::resource('/home', HomeController::class); 
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
});
Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::get('/prueba', function () {
    return "¡Prueba exitosa!";
});

Route::get('/insert', function () {
    $customer = app('firebase.firestor$e')->database()->collection('Customers')->newDocument();
    $customer->set([
        'name' => 'Yan',
        'lastname' => 'Cerna',
        'age' => 20,
        'email' => 'yancerna1498@gmail.com',
        'phone' => '908765432',
        'country' => 'Peru',
    ]);
});