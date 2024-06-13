<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CajRundingan extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'caj_rundingans';
    protected $fillable = [
        'caj_rundingan_name',
        'caj_rundingan_amaun',
        'caj_rundingan_fk_clinic',
        'caj_rundingan_status',
    ];

    public function klinik()
    {
        return $this->belongsTo(Klinik::class, 'caj_rundingan_fk_clinic');
    }
}
