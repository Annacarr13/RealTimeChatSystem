<?php

namespace App\Http\Controllers\Leader;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Course;

class IndexController extends Controller
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
      return view('student.index')
    }

    public function getRegistered()
    {

      return view('leader.course_registration')
    }
    public function postRegistered()
    {
      $user = Auth::user();
      $role = $user['role'];
      return view('leader.index')
    }


}
