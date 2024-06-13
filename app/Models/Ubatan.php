<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ubatan extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'ubatans';
    protected $fillable = [
        'ubatan_name',
        'ubatan_amaun',
        'ubatan_fk_clinic',
        'ubatan_status',
    ];

    public function klinik()
    {
        return $this->belongsTo(Klinik::class, 'ubatan_fk_clinic');
    }
}
