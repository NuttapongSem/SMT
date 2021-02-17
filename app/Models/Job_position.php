<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job_position extends Model
{
    use HasFactory;

    protected $table = 'job_position';

    protected $fillable = [
        'name',
        'id_group'
    ];
}
