<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeteranganPenambahan extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'keterangan_penambahans';
    protected $fillable = [
        'fk_application',
        'application_type',
        'application_item',
        'application_amaun',
    ];

    public function permohonanPenambahan()
    {
        return $this->belongsTo(PermohonanPenambahan::class, 'fk_application');
    }
}
