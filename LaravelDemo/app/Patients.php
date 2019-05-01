<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patients extends Model
{
     protected $fillable = [
        'name',
        'dateofbirth'       
    ];

    public function Visits(){
        return $this->hasOne('App\Visits');
    }
}
