<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ManualReport extends Model
{
    protected $table = "manual_reports";

    protected $fillable = ['regate', 'postal_code', 'city', 'serial', 'type', 'report_date', 'crack', 'crack_length', 'observations', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
