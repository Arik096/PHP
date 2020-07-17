<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArikCovid extends Model
{
    protected $table = 'arik_covids';
    protected $fillable = ['name','area','symptoms','date'];
}
