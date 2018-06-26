<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public $timestamps = false;

    protected $guarded = ['id'];

    public function quests()
    {
        return $this->hasMany('App\Models\Quest');
    }
}
