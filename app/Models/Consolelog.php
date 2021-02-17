<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consolelog extends Model
{
    use HasFactory;
    protected $table = 'consolelog';

    protected $fillable = [
        'user_id',
        'public',
        'message'
    ];
}
