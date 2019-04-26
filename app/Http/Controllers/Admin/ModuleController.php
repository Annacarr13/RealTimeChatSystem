<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Course;
use App\University as Uni;
use App\Module;

class ModuleController extends Controller
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
       $modules = Module::all();
       $return = [];
         foreach ($modules as $module) {
             $user = User::find($module->leader_id);
             $name =  $user->first_name . ' ' . $user->last_name;
             $course = Course::find($module->course_id);
             $return[] = [$module->title, $module->description, $course['title'], $name, $module->id];
         }

         return view('Admin.module.index', [
             'modules' => $return
         ]);

     }
     public function getAdd()
     {
       $leaders = User::where('role', '=', 'courseLeader')
                        ->orWhere('role', '=', 'lecturer')
                        ->get();
       $courses = Course::all();

       return view('admin.course.add', [
         'leaders' => $leaders,
         'courses' => $courses,
       ]);
     }
     public function postAdd(Request $request)
     {
       $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'leader' => 'required',
            'course' => 'required',

        ]);

        $module = new Module;
        $module->title = Request()->input('title');
        $module->description = Request()->input('description');
        $module->leader_id = Request()->input('leader');
        $module->course_id = Request()->input('course');
        $module->created_by = Auth::id();

        $module->save();

       return Redirect()->to('admin/modules');
     }
     public function getEdit()
     {
       $id = Request()->input('moduleId');

       $module = Module::find($id);
       $leaders = User::where('role', '=', 'courseLeader')
                        ->orWhere('role', '=', 'lecturer')
                        ->get();
       $courses = Course::all();
       return view('admin.module.edit',[
         'courses' => $courses,
         'leaders' => $leaders,
         'module' => $module,
       ]);
     }
     public function postEdit(Request $request)
     {

       $validatedData = $request->validate([
           'title' => 'required|max:255',
           'description' => 'required',
           'leader' => 'required',
           'course' => 'required',

        ]);

        $id = Request()->input('moduleId');
        $module = Module::findorFail($id);
        $module['title'] = Request()->input('title');
        $module['description'] = Request()->input('description');
        $module['leader_id'] = Request()->input('leader');
        $module['course_id'] = Request()->input('course');

        $module->save();

       return Redirect()->to('admin/modules');
     }




}
