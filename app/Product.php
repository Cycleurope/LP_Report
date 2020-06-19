<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['code'];

    public function serials()
    {
        return $this->hasMany(Serial::class);
    }
}
