<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function _construct() {
      $this->middleware('auth');
      $this->middleware('role:doctor');
    }
}
