<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bod extends Model
{
    use HasFactory;

    public function tanggungans()
    {
        return $this->morphMany(Tanggungan::class, 'profilable');
    }
}
