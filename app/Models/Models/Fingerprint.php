<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fingerprint extends Model
{
    use HasFactory;

    protected $table = 'fingerprint';
     
    protected $fillable = [
        'name',
        'age',
        'interest',
        'imguse',
        'fingerprint'
    ];
}
