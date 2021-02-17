<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log_mobile extends Model
{
    use HasFactory;
    protected $table = 'log_mobile';

    protected $fillable = [
        'screen',
        'function',
        'message'

    ];
}
