<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $table = 'position';

    protected $dates = ['created_at', 'updated_at'];
}
