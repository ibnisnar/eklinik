<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilBod extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'profil_bods';
    protected $fillable = [
        'bod_dependents_name',
        'bod_staff_id',
        'bod_ic',
        'bod_phone',
        'bod_email',
        'bod_address',
        'bod_remark',
        'bod_status',
    ];

    public function tanggungans()
    {
        return $this->hasMany(TanggunganBod::class, 'bod_id');
    }
}
