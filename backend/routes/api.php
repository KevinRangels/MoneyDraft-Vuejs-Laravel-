<?php

use Illuminate\Http\Request;
use App\Testimonio;
use App\Http\Resources\TestimonioCollection;
use App\Http\Resources\Testimonio as TestimonioResource;


Route::get('pricerefence', 'TasaController@getAllPrices');
Route::get('tasa', 'TasaController@getTasa');
Route::get('tasalocalbitcoin', 'TasaController@getTasaLocalBitcoin');
Route::get('testimonials', 'TasaController@getTestimonials');




