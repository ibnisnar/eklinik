<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeteranganPerubahan extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'keterangan_perubahans';
    protected $fillable = [
        'fk_application',
        'application_type',
        'application_item',
        'application_amaun',
    ];

    public function permohonanPerubahan()
    {
        return $this->belongsTo(PermohonanPerubahan::class, 'fk_application');
    }
}
