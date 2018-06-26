<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
   public $timestamps = false;


   public function scopeObtienePlantilla ($query) {

       return $query->where('status_id', 1);
   }
}
