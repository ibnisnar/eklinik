<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TindakanAgensi extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'tindakan_agensis';
    protected $fillable = [
        'actionable_id',
        'actionable_type',
        'action_application_date',
        'action_application_remark',
        'action_application_officer',
        'action_application_role',
        'action_application_agensi_name',
    ];

    public function actionable()
    {
        return $this->morphTo();
    }
}
