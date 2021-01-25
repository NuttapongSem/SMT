<?php

namespace App\Models;

use Database\Factories\AttendanceFactory;
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
    public function attendance()
    {
        return $this->hasMany(Attendance::class, 'fingerprint_id', 'id')->orderBy('created_at','DESC');
    }
}
