<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visits extends Model
{
    protected $fillable = [
    	'visit_date',
        'patients_id',
        'doctor_id'
    ];

    public function Patients()
    {
      //  return $this->hasMany('App\Patients');
        return $this->belongsTo(Patients::class)->select(['name', 'dateofbirth']);
    }
   	 public function Doctor(){
        return $this->belongsTo(Doctor::class)->select(['name', 'occupation']);
    }
}
