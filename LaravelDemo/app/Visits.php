<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visits extends Model
{
    protected $fillable = [
    	'visit_date',
        'patient_id',
        'patient_fullname',
        'doctor_id',
        'doctor_fullname'  
    ];
}
