<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = "reports";

    protected $fillable = ['bike', 'brand_id', 'audit_checkup', 'report_date', 'crack', 'crack_length', 'observations', 'frame_replacement', 'serial_id', 'user_id', 'regate_id'];

    public function serial()
    {
        return $this->belongsTo(Serial::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function regate()
    {
        return $this->belongsTo(Regate::class);
    }

    public function crackStatus()
    {
        if($this->crack) {
            return '<span class="text-danger">OUI</span>';
        } else {
            return '<span class="text-success">NON</span>';
        }
    }
    
}
