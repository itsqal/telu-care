<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReportFollowUp extends Model
{
    protected $fillable = [
        'follow_up_status',
        'follow_up_decsription',
        'report_id',
    ];

    public function report()
    {
        return $this->belongsTo(Report::class);
    }
}
