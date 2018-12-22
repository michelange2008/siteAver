<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DateMaJFevec extends Model
{
    protected $table = "datemajfevec";

    protected $guarded = [];

    protected $dates = [
        'date',
        'created_at',
        'updated_at',
    ];
}
