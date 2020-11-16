<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poblation extends Model
{
    protected $fillable =["description"];
    public function provinces()
    {
        return $this->hasMany('App\Provinces', 'poblation_id', 'id');
    }
}
