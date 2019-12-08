<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Role;
use App\User;
use App\Doctor;
use App\Visit;

class Patient extends Model
{
  public function user(){
    return $this->belongsTo('App\User');
  }
    public function visits() {
      return $this->belongsToMany('App\Doctor', 'visits')->using('App\Visit');
    }
}
