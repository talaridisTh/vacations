<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vacation extends Model {

    protected $guarded = [];

    protected $casts = ['vacation_start' => 'datetime', 'vacation_end' => 'datetime'];

}