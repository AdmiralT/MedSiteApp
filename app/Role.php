<?php
# @Date:   2019-11-19T13:55:02+00:00
# @Last modified time: 2019-11-19T14:35:33+00:00




namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
  public function users() {
    return $this->belongsToMany('App\User', 'user_role');
  }
}
