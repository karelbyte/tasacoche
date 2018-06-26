<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quest extends Model
{
    protected $table = 'question_details';

    protected $guarded = ['id'];

    public $timestamps = false;
}
