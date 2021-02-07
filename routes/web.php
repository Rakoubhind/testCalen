<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

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
});
 
 
Route::get('ckeditor', [EventController::class, 'index']);
Route::post('fullcalendar/create', [EventController::class, 'create']);
Route::post('fullcalendar/update', [EventController::class, 'update']);
Route::post('fullcalendar/delete', [EventController::class, 'destroy']);
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashlite', function () {
    return view('dashlite.app.base');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('comptes', [App\Http\Controllers\UserController::class, 'index'])->name('comptes');
Route::post('comptes', [App\Http\Controllers\UserController::class, 'store'])->name('comptes.store');
Route::get('comptes/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
Route::post('comptes/update/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
Route::get('comptes/delete/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');

Route::get('agents', [App\Http\Controllers\AgentController::class, 'index'])->name('agents');
Route::post('agents', [App\Http\Controllers\AgentController::class, 'store'])->name('agent.store');
Route::get('agents/edit/{id}', [App\Http\Controllers\AgentController::class, 'edit'])->name('agent.edit');
Route::post('agents/update/{id}', [App\Http\Controllers\AgentController::class, 'update'])->name('agent.update');
Route::get('agents/delete/{id}', [App\Http\Controllers\AgentController::class, 'destroy'])->name('agent.destroy');

Route::get('appointment', [App\Http\Controllers\AppointmentController::class, 'index'])->name('appointment');
Route::get('addAppointment', [App\Http\Controllers\AppointmentController::class, 'create'])->name('addAppointment');
Route::post('appointment/store', [App\Http\Controllers\AppointmentController::class, 'store'])->name('addAppointment');
Route::get('appointment/edit:{id}', [App\Http\Controllers\AppointmentController::class, 'edit'])->name('appointment.edit');
Route::post('appointment/update/{id}', [App\Http\Controllers\AppointmentController::class, 'update'])->name('appointment.update');
Route::post('appointment/delete/{id}', [App\Http\Controllers\AppointmentController::class, 'destroy'])->name('appointment.destroy');
Route::get('fetch/{id}', [App\Http\Controllers\AppointmentController::class, 'fetchteamInstaller'])->name('fetch');
Route::get('filtrer', [App\Http\Controllers\AppointmentController::class, 'show'])->name('appoitment.show');
Route::get('getAppointment', [App\Http\Controllers\AppointmentController::class, 'getAppointment'])->name('getAppointment');

Route::get('teams', [App\Http\Controllers\TeamController::class, 'index'])->name('teams');
Route::post('teams', [App\Http\Controllers\TeamController::class, 'store'])->name('team.store');
Route::get('teams/edit/{id}', [App\Http\Controllers\TeamController::class, 'edit'])->name('team.edit');
Route::post('teams/update/{id}', [App\Http\Controllers\TeamController::class, 'update'])->name('team.update');
Route::get('teams/delete/{id}', [App\Http\Controllers\TeamController::class, 'destroy'])->name('team.destroy');

Route::get('/history', [App\Http\Controllers\HistoryController::class, 'index'])->name('histories');
Route::get('/history/delete/{id}', [App\Http\Controllers\HistoryController::class, 'destroy'])->name('history.destroy');

Route::get('agenda', [App\Http\Controllers\AgendaController::class, 'index'])->name('agenda');

Route::get('configfiscale', [App\Http\Controllers\FiscaleController::class, 'edit'])->name('fiscale.edit');
Route::get('setfiscale', [App\Http\Controllers\FiscaleController::class, 'update'])->name('fiscale.update');
Route::get('getfiscale', [App\Http\Controllers\FiscaleController::class, 'index'])->name('fiscale.show');
