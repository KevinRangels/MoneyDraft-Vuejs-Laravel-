<?php


Route::get('/', 'AdminController@index')->name('home');
Route::get('/testimonios', 'AdminController@testimonies')->name('testimonies');

//CALCULOS
Route::get('/data', 'MainController@getApi')->name('inicio');
// Autenticacion
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
//ALMACENAR DATA DE LOCALBITCIONS
Route::get('/welcome', 'TasaController@getApi')->name('welcome');
//TASA
Route::post('newtasa','AdminController@crearTasa');
Route::post('beneficiolocalbitcoin','AdminController@TasaLocalbitcoin');

//TESTIMONIALS
Route::post('addtestimonials','AdminController@addTestimonials')->name('add.testimonials');
// Route::get('/testimonios', 'AdminController@getTestimonials');

Route::delete('testimonios/{id}', 'AdminController@deleteTestimonials')->name('testimonials.eliminar');

Route::get('testimonios/{id}', 'AdminController@testimonialDetails')->name('testimonial.detail');
Route::put('/testimonios/{id}', 'AdminController@updateTestimonial')->name('testimonial.update');
