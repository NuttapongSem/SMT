<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class secret_infos extends Model
{
    use HasFactory;
    protected $table = 'secret_infos';
    protected $fillable = [
        'secret'
    ];
}
