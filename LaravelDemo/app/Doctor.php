<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
     protected $fillable = [
        'name',
        'occupation'       
    ];

    public function Visits(){
        return $this->hasOne('App\Visits');
    }
}
