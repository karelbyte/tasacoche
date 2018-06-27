<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Datosganvam extends Model
{
    protected $table = 'datos_ganvam';

    public $timestamps = false;

    protected $guarded = ['id'];
}
