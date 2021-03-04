<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;
    protected $table = 'leave';
    protected $fillable = [

        'name_id',
        'annotation',
        'leave_type',
        'group',
        'jobposition',
        'date_start',
        'date_end',
        'endorser',
        'position_endorser',
        'path_pdf',

    ];

    public function profiles()
    {
        return $this->hasOne(Fingerprint::class, 'id', 'name_id');
    }

}
