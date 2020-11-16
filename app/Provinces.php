<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provinces extends Model
{
    protected $fillable =["description","poblation_id"];
    public function poblation()
    {
        return $this->belongsTo('App\Poblation', 'poblation_id', 'id');
    }
}
