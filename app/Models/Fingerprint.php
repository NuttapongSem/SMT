<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fingerprint extends Model
{
    use HasFactory;

    protected $table = 'fingerprint';
    protected $with = ['jobpositions', 'groups'];
    protected $fillable = [
        'name',
        'group',
        'jobposition',
        'birthday',
        'interest',
        'imguser',
        'fingerprint',
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
    public function birthdayformat()
    {
        $birthday = \Carbon\Carbon::make($this->birthday)->format('d-m-Y');
        return $birthday;
    }
    public function leave()
    {
        return $this->hasMany(Leave::class, 'name_id', 'id')->orderBy('updated_at', 'DESC');
    }
    public function groups()
    {
        return $this->hasOne(Group_position::class, 'id', 'group');
    }
    public function jobpositions()
    {
        return $this->hasOne(Job_position::class, 'id', 'jobposition');
    }
}
