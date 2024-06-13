<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TindakanDoktor extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'tindakan_doktors';
    protected $fillable = [
        'actionable_id',
        'actionable_type',
        'action_application_date',
        'action_application_remark',
        'action_application_officer',
    ];

    public function actionable()
    {
        return $this->morphTo();
    }
}
