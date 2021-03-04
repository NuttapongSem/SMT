<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $table = 'attendance';
    protected $primarykey = 'num';
    protected $fillable =
    [
        'fingerpint_id',
        'date',
        'Time',
        'status'


    ];
    public function fingerprint()
    {
        return $this->belongsTo(Fingerprint::class, 'fingerprint_id', 'id');
    }
    public function getall()
    {
        $data = Fingerprint::where("id", $this->fingerprint_id)->first();

        return $data;
    }
}
