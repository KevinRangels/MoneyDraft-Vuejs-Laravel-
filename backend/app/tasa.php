<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tasa extends Model
{
        protected $table = "tasas";
        protected $fillable = ['tasa', 'beneficio']; 

}
