<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TanggunganBod extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'tanggungan_bods';
    protected $fillable = [
        'bod_id',
        'bod_dependents_name',
        'bod_dependents_ic',
        'bod_dependents_age',
        'bod_dependents_relations',
        'bod_dependents_remark',
        'bod_dependents_status',
    ];

    public function profilBod()
    {
        return $this->belongsTo(ProfilBod::class, 'bod_id');
    }
}
