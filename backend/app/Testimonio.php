<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonio extends Model
{
        protected $table = "testimonios";
        protected $fillable = ['name', 'testimonials','operation','calification','date', 'avatar']; 
}
