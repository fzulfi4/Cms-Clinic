<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile', 'ProfileController@update')->name('profile.update');

Route::get('/about', function () {
    return view('about');
})->name('about');

//users
Route::get('/users', 'UsersController@index')->name('users');
Route::get('/users/create', 'UsersController@create')->name('users.create');
Route::get('/users/edit/{id}', 'UsersController@edit')->name('users.edit');
Route::post('/users/store', 'UsersController@store')->name('users.store');
Route::put('/users/update/{id}', 'UsersController@update')->name('users.update');
Route::delete('/users/destroy/{id}', 'UsersController@destroy')->name('users.destroy');

//doctors
Route::get('/doctors', 'DoctorController@index')->name('doctors');
Route::get('/doctors/create', 'DoctorController@create')->name('doctors.create');
Route::get('/doctors/edit/{id}', 'DoctorController@edit')->name('doctors.edit');
Route::post('/doctors/store', 'DoctorController@store')->name('doctors.store');
Route::put('/doctors/update/{id}', 'DoctorController@update')->name('doctors.update');
Route::delete('/doctors/destroy/{id}', 'DoctorController@destroy')->name('doctors.destroy');

//specialists
Route::get('/specialists', 'SpecialistsController@index')->name('specialists');
Route::get('/specialists/create', 'SpecialistsController@create')->name('specialists.create');
Route::get('/specialists/edit/{id}', 'SpecialistsController@edit')->name('specialists.edit');
Route::post('/specialists/store', 'SpecialistsController@store')->name('specialists.store');
Route::put('/specialists/update/{id}', 'SpecialistsController@update')->name('specialists.update');
Route::delete('/specialists/destroy/{id}', 'SpecialistsController@destroy')->name('specialists.destroy');


// Route::get('/users', 'ProfileController@index')->name('users');

// Route::get('/users', function () {
//     return view('users');
// })->name('users');
