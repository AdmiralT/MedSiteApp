<?php
# @Date:   2019-11-19T13:45:07+00:00
# @Last modified time: 2019-11-19T15:37:26+00:00




namespace App\Http\Controllers;
use App\Role;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $home = 'user.home';

        if($user->hasRole('admin')) {
          $home = 'admin.home';
        }
        else {
          $home = 'user.home';
        }
        return redirect()->route($home);
    }
}
