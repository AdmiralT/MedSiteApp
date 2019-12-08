<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Role;
use App\User;
use App\Visit;
use App\Patient;
class Doctor extends Model
{


  public function user(){
    return $this->belongsTo('App\User');
  }
  public function visits() {
    return $this->belongsToMany('App\Patient', 'visits')->using('App\Visit');
  }
}
