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

    public function reportsCount()
    {   
        $count = $this->reports->count();
        if ($count === 0) {
            return '<span class="badge badge-pill badge-light text-secondary">Aucun rapport associé</span>';
        } else if($count === 1) {
            return '<span>1 rapport associé</span>';
        } else {
            return '<span>'.$count.' rapports associés</span>';
        }
    }
}
