<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serial extends Model
{
    protected $table = "serials";

    protected $fillable = ['code', 'product_code', 'cei_order', 'poste_order', 'regate_id', 'manufactured_at', 'product_id'];

    public function regate()
    {
        return $this->belongsTo(Regate::class);
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
