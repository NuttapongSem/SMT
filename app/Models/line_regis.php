<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Auth;

class line_regis extends Auth
{

    use HasFactory;
    protected $table = 'line_regis';
    public $timestamps = false;
    protected $fillable = [
        'user_id'
    ];
}
