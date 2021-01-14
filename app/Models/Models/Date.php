<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    use HasFactory;

    protected $table = 'date';
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
}
