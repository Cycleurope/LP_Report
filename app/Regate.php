<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Regate extends Model
{
    protected $table = "regates";
    
    protected $fillable = ['name', 'code', 'address1', 'address2', 'postal_code', 'city'];

    public function serials()
    {
        return $this->hasMany(Serial::class);
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }
}
