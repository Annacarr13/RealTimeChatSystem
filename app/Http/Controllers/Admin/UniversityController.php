<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use Auth;
use App\University as Uni;

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
      $unis = Uni::all();
      $return = [];
        foreach ($unis as $uni) {


            $return[] = [$uni->name, $uni->city, $uni->county, $uni->country, $uni->id];
        }

        return view('Admin.university.index', [
            'universities' => $return
        ]);

    }
    public function getAdd()
    {

      return view('admin.university.add');
    }
    public function postAdd(Request $request)
    {
      $validatedData = $request->validate([
           'name' => 'required|unique:universities|max:255',
           'city' => 'required',
           'county' => 'required',
           'country' => 'required',
       ]);

       $uni = new Uni;
       $uni->name = Request()->input('name');
       $uni->city = Request()->input('city');
       $uni->county = Request()->input('county');
       $uni->country = Request()->input('country');
       $uni->save();

      return Redirect()->to('admin/universities');
    }
    public function getEdit()
    {
      $id = Request()->input('uniId');
      $uni = Uni::find($id);
      return view('admin.university.edit',[
        'uni' => $uni,
      ]);
    }
    public function postEdit(Request $request)
    {

      $validatedData = $request->validate([
           'name' => 'required|max:255',
           'city' => 'required',
           'county' => 'required',
           'country' => 'required',
       ]);
       $id = Request()->input('uniId');
       $uni = Uni::first($id);
       $uni['name'] = Request()->input('name');
       $uni['city'] = Request()->input('city');
       $uni['county'] = Request()->input('county');
       $uni['country'] = Request()->input('country');
       $uni->save();

      return Redirect()->to('admin/universities');
    }

    // $uni->name = Request()->input('name');
    // $uni->city = Request()->input('city');
    // $uni->county = Request()->input('county');
    // $uni->country = Request()->input('country');

}
