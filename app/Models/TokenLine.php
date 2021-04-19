<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TokenLine extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'token_line';
    protected $fillable = [
        'token'
    ];
}
