<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanggungan extends Model
{
    use HasFactory;

    public function profilable()
    {
        return $this->morphTo();
    }
}
