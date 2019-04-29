<?php

namespace App\Http\Controllers\Admin\University;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Course;
use App\Models\University;
use App\Models\Module;

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
    public function getIndex()
    {
      $unis = Uni::all();

      $return = [];
        foreach ($unis as $uni) {


            $return[] = [$uni->name, $uni->city, $uni->county, $uni->country, $uni->id];
        }

        return view('Admin.university.index', [
            'uni' => $return,
        ]);
        
      return view('Admin.index');
    }

    public function getRegistered()
    {

      return view('admin.course_registration');
    }
    public function postRegistered()
    {
      $user = Auth::user();
      $role = $user['role'];
      return view('leader.index');
    }


}
