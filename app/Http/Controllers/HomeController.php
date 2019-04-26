<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

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
    public function index()
    {
        $user = Auth::user();
        $role = $user['role'];
        $path = $this->getRouteGroupIndex($role);

        return Redirect()->to($path);
    }

    public function userdd()
    {
      $user = Auth::user();
      $role = $user['role'];
      dd($role);
    }

    public function getRouteGroupIndex($role)
    {

        switch ($role)
        {
            case 'admin':
                return '/admin/registered';
                break;
            case 'dean':
                return '/dean/registered';
                break;
            case 'leader':
                return '/courseLeader/registered';
                break;
            case 'lecturer':
                return '/lecturer/registered';
                break;
            case 'student':
                return '/student/registered';
                break;

        }
    }
}
