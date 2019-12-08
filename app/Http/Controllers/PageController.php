<?php
# @Date:   2019-11-26T12:58:48+00:00
# @Last modified time: 2019-11-26T13:09:09+00:00




namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function welcome() {
      return view('welcome');
    }

    public function about() {
      return view('about');
    }
}
