<?php
# @Date:   2019-11-19T15:14:57+00:00
# @Last modified time: 2019-11-19T15:55:04+00:00




namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('role:user');
  }
  public function index() {
    return view('user.home');
  }
}
