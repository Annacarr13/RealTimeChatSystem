<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Course;
use App\Models\University;
use App\Models\Module;

class UniversityController extends Controller
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
    public function getIndex()
    {
      return view('Admin.university.index');
    }

    public function loadTable()
    {


      return view('admin.course_registration');
    }
    public function getAdd()
    {

      return view('leader.index');
    }
    public function postAdd()
    {

      return view('leader.index');
    }



}
