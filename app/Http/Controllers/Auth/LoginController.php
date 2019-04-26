<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;



class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/logged_in';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function checkRole()
  {
    // This is how the intended function works
    // Pulling from session completely removes whatever was placed.
    $user = Auth::user();

    // If the intended url was the login or logout, it becomes the home index $redirectTo
    $path = $this->getRouteGroupIndex($user['role']);

      return Redirect()->to($path);


  }

  public function getRouteGroupIndex($role)
  {

      switch ($role)
      {
          case 'admin':
              return '/admin';
              break;
          case 'dean':
              return '/dean';
              break;
          case 'leader':
              return '/courseLeader';
              break;
          case 'lecturer':
              return '/lecturer';
              break;
          case 'student':
              return '/student';
              break;

      }
  }
}
