<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;

class Cms extends Model
{
    protected $table = 'template_options';

    public $timestamps = false;

    public function scopeTipo($query, $tipo, $key)
    {
        return $query->where('tipo', $tipo)->select($key);
    }
}
