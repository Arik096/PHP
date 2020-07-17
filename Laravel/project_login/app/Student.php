<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table='students';
    protected $fillable = ['Student_name','Student_id','Student_dept','Student_LT'];
}
