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
        'group',
        'jobposition',
        'birthday',
        'interest',
        'imguser',
        'fingerprint'
    ];
    public function attendance()
    {
        return $this->hasMany(Attendance::class, 'fingerprint_id', 'id')->orderBy('created_at', 'DESC');
    }
    public function nameposition()
    {
        $data = Group_position::where("id", $this->group)->first();

        return $data->name;
    }
}
