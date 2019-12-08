<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
  public function visits() {
    return $this->belongsToMany('App\Doctor', 'visits')->using('App\Visit');
    return $this->belongsToMany('App\Patient', 'visits')->using('App\Visit');
  }
}
