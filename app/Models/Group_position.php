<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group_position extends Model
{
    use HasFactory;

    protected $table = 'group_position';

    protected $fillable = [
        'name',

    ];
    public function job_position()
    {
        return $this->hasOne(Job_position::class, 'id_group', 'id');
    }

}
