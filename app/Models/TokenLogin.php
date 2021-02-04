<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TokenLogin extends Model
{
    use HasFactory;
    protected $table = 'token_logins';
    protected $fillable = [
        'token',
        'email'
    ];
}
