<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use Auth;
use App\Course;
use App\User;
use App\University as Uni;

class CourseController extends Controller
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
       $courses = Course::all();
       $return = [];
         foreach ($courses as $course) {
             $user = User::find($course->leader_id);
             $name =  $user->first_name . ' ' . $user->last_name;
             $return[] = [$course->title, $course->description, $name, $course->id];
         }

         return view('Admin.course.index', [
             'courses' => $return
         ]);

     }
     public function getAdd()
     {
       $leaders = User::where('role', '=', 'courseLeader')
                      ->get();
       $unis = Uni::all();

       return view('admin.course.add', [
         'leaders' => $leaders,
         'unis' => $unis,
       ]);
     }
     public function postAdd(Request $request)
     {
       $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'leader' => 'required',
            'university' => 'required',

        ]);

        $course = new Course;
        $course->title = Request()->input('title');
        $course->description = Request()->input('description');
        $course->leader_id = Request()->input('leader');
        $course->university_id = Request()->input('university');

        $course->save();

       return Redirect()->to('admin/courses');
     }
     public function getEdit()
     {
       $id = Request()->input('courseId');
       $course = Course::find($id);
       $leaders = User::where('role', '=', 'courseLeader')
                      ->get();
       $unis = Uni::all();
       return view('admin.course.edit',[
         'course' => $course,
         'leaders' => $leaders,
         'unis' => $unis,
       ]);
     }
     public function postEdit(Request $request)
     {

       $validatedData = $request->validate([
           'title' => 'required|max:255',
           'description' => 'required',
           'leader' => 'required',
           'university' => 'required',

        ]);

        $id = Request()->input('courseId');
        $course = Course::find($id);
        $course['title'] = Request()->input('title');
        $course['description'] = Request()->input('description');
        $course['leader_id'] = Request()->input('leader');
        $course['university_id'] = Request()->input('university');

        $course->save();

       return Redirect()->to('admin/courses');
     }




}
