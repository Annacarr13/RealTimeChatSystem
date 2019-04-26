<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class TestEvent implements ShouldBroadcast
{
    public $text;

    public function __construct($text)
    {
        $this->text = $text;
    }

    public function broadcastOn()
    {
        return ['test-channel'];
    }
}

Route::get('/broadcast', function() {
    event(new TestEvent('Broadcasting in Laravel using Pusher!'));

    return view('welcome');
});


Route::get('/', function () {
    return view('welcome');
});
Route::get('/bridge', function() {
    // $pusher = App::make('pusher');
    //
    // $pusher->trigger( 'test-channel',
    //                   'test-event',
    //                   array('text' => 'Preparing the Pusher Laracon.eu workshop!'));

    return view('welcome');
});

Auth::routes();

Route::get('/home', function () {
    return view('home');
});
// Route::get('/home', 'HomeController@userdd')->name('home');
Route::get('/logged_in', 'Auth\LoginController@checkRole')->name('logged_in');
Route::get('/registered', 'HomeController@index')->name('registered');
//
//Route group for administrator
//
Route::group(['middleware' => ['auth', 'role:admin'], 'prefix' => '/admin'], function () {

  Route::get('/', 'Admin\IndexController@getIndex'); //

  Route::get('/users', 'Admin\UserController@getIndex'); //
  Route::get('/users/add', 'Admin\UserController@getAdd'); //
  Route::post('/users/add', 'Admin\UserController@postAdd'); //
  Route::get('/users/edit', 'Admin\UserController@getEdit'); //
  Route::post('/users/edit', 'Admin\UserController@postEdit'); //
  Route::post('/users/delete', 'Admin\UserController@Delete'); //

  Route::get('/universities', 'Admin\UniversityController@getIndex'); //
  Route::get('/universities/add', 'Admin\UniversityController@getAdd'); //
  Route::post('/universities/add', 'Admin\UniversityController@postAdd'); //
  Route::get('/universities/edit', 'Admin\UniversityController@getEdit'); //
  Route::post('/universities/edit', 'Admin\UniversityController@postEdit'); //
  Route::post('/universities/delete', 'Admin\UniversityController@Delete'); //

  // Route::get('/universities/departments', 'Admin\University\DepartmentsController@getIndex'); //
  // Route::get('/universities/departments/add', 'Admin\University\DepartmentsController@getAdd'); //
  // Route::post('/universities/departments/add', 'Admin\University\DepartmentsController@postAdd'); //
  // Route::get('/universities/departments/edit', 'Admin\University\DepartmentsController@getEdit'); //
  // Route::post('/universities/departments/edit', 'Admin\University\DepartmentsController@postEdit'); //
  // Route::post('/universities/departments/delete', 'Admin\University\DepartmentsController@Delete'); //
  //
  // Route::get('/universities/departments/courses', 'Admin\University\CourseController@getIndex'); //
  // Route::get('/universities/departments/courses/add', 'Admin\University\CourseController@getAdd'); //
  // Route::post('/universities/departments/courses/add', 'Admin\University\CourseController@postAdd'); //
  // Route::get('/universities/departments/courses/edit', 'Admin\University\CourseController@getEdit'); //
  // Route::post('/universities/departments/courses/edit', 'Admin\University\CourseController@postEdit'); //
  // Route::post('/universities/departments/courses/delete', 'Admin\University\CourseController@Delete'); //
  //
  // Route::get('/universities/departments/course/modules', 'Admin\University\ModuleController@getIndex'); //
  // Route::get('/universities/departments/course/modules/add', 'Admin\University\ModuleController@getAdd'); //
  // Route::post('/universities/departments/course/modules/add', 'Admin\University\ModuleController@postAdd'); //
  // Route::get('/universities/departments/course/modules/edit', 'Admin\University\ModuleController@getEdit'); //
  // Route::post('/universities/departments/course/modules/edit', 'Admin\University\ModuleController@postEdit'); //
  // Route::post('/universities/departments/course/modules/delete', 'Admin\University\ModuleController@Delete'); //

  Route::get('/courses', 'Admin\CourseController@getIndex'); //
  Route::get('/courses/add', 'Admin\CourseController@getAdd'); //
  Route::post('/courses/add', 'Admin\CourseController@postAdd'); //
  Route::get('/courses/edit', 'Admin\CourseController@getEdit'); //
  Route::post('/courses/edit', 'Admin\CourseController@postEdit'); //
  Route::post('/courses/delete', 'Admin\CourseController@Delete'); //

  Route::get('/modules', 'Admin\ModuleController@getIndex'); //
  Route::get('/modules/add', 'Admin\ModuleController@getAdd'); //
  Route::post('/modules/add', 'Admin\ModuleController@postAdd'); //
  Route::get('/modules/edit', 'Admin\ModuleController@getEdit'); //
  Route::post('/modules/edit', 'Admin\ModuleController@postEdit'); //
  Route::post('/modules/delete', 'Admin\ModuleController@Delete'); //

  Route::get('/chats', 'Admin\ChatController@getIndex'); //
  Route::get('/chats/create', 'Admin\ChatController@getCreate'); //
  Route::post('/chats/create', 'Admin\ChatController@postCreate '); //
  Route::get('/chats/manage', 'Admin\ChatController@getmanage'); //
  Route::post('/chats/manage', 'Admin\ChatController@postmanage'); //
  Route::post('/chats/delete', 'Admin\ChatController@Delete'); //



});
//
//Route group for dean
//
Route::group(['middleware' => ['auth', 'role:dean'], 'prefix' => '/dean'], function () {

  Route::get('/', 'Dean\IndexController@getIndex'); //

  Route::get('/departments', 'Dean\DepartmentsController@getIndex'); //
  Route::get('/departments/add', 'Dean\DepartmentsController@getAdd'); //
  Route::post('/departments/add', 'Dean\DepartmentsController@postAdd'); //
  Route::get('/departments/edit', 'Dean\DepartmentsController@getEdit'); //
  Route::post('/departments/edit', 'Dean\DepartmentsController@postEdit'); //
  Route::post('/departments/delete', 'Dean\DepartmentsController@Delete'); //

  Route::get('/departments/courses', 'Dean\Department\CourseController@getIndex'); //
  Route::get('/departments/courses/add', 'Dean\Department\CourseController@getAdd'); //
  Route::post('/departments/courses/add', 'Dean\Department\CourseController@postAdd'); //
  Route::get('/departments/courses/edit', 'Dean\Department\CourseController@getEdit'); //
  Route::post('/departments/courses/edit', 'Dean\Department\CourseController@postEdit'); //
  Route::post('/departments/courses/delete', 'Dean\Department\CourseController@Delete'); //

  Route::get('/departments/course/modules', 'Dean\Department\ModuleController@getIndex'); //
  Route::get('/departments/course/modules/add', 'Dean\Department\ModuleController@getAdd'); //
  Route::post('/departments/course/modules/add', 'Dean\Department\ModuleController@postAdd'); //
  Route::get('/departments/course/modules/edit', 'Dean\Department\ModuleController@getEdit'); //
  Route::post('/departments/course/modules/edit', 'Dean\Department\ModuleController@postEdit'); //
  Route::post('/departments/course/modules/delete', 'Dean\Department\ModuleController@Delete'); //

  Route::get('/courses', 'Dean\CourseController@getIndex'); //
  Route::get('/courses/add', 'Dean\CourseController@getAdd'); //
  Route::post('/courses/add', 'Dean\CourseController@postAdd'); //
  Route::get('/courses/edit', 'Dean\CourseController@getEdit'); //
  Route::post('/courses/edit', 'Dean\CourseController@postEdit'); //
  Route::post('/courses/delete', 'Dean\CourseController@Delete'); //

  Route::get('/modules', 'Dean\ModuleController@getIndex'); //
  Route::get('/modules/add', 'Dean\ModuleController@getAdd'); //
  Route::post('/modules/add', 'Dean\ModuleController@postAdd'); //
  Route::get('/modules/edit', 'Dean\ModuleController@getEdit'); //
  Route::post('/modules/edit', 'Dean\ModuleController@postEdit'); //
  Route::post('/modules/delete', 'Dean\ModuleController@Delete'); //

  Route::get('/chats', 'Dean\ChatController@getIndex'); //
  Route::get('/chats/create', 'Dean\ChatController@getCreate'); //
  Route::post('/chats/create', 'Dean\ChatController@postCreate '); //
  Route::get('/chats/manage', 'Dean\ChatController@getmanage'); //
  Route::post('/chats/manage', 'Dean\ChatController@postmanage'); //
  Route::post('/chats/delete', 'Dean\ChatController@Delete'); //

});
//
//Route group for Course leaders/Head of Department
//
Route::group(['middleware' => ['auth', 'role:leader'], 'prefix' => '/leader'], function () {

  Route::get('/registered', 'Leader\IndexController@getRegistered'); //
  Route::post('/registered', 'Leader\IndexController@postRegistered'); //

  Route::get('/', 'Leader\IndexController@getIndex'); //

  Route::get('/modules', 'Dean\ModuleController@getIndex'); //
  Route::get('/modules/add', 'Dean\ModuleController@getAdd'); //
  Route::post('/modules/add', 'Dean\ModuleController@postAdd'); //
  Route::get('/modules/edit', 'Dean\ModuleController@getEdit'); //
  Route::post('/modules/edit', 'Dean\ModuleController@postEdit'); //
  Route::post('/modules/delete', 'Dean\ModuleController@Delete'); //

  Route::get('/chats', 'Dean\ChatController@getIndex'); //
  Route::get('/chats/create', 'Dean\ChatController@getCreate'); //
  Route::post('/chats/create', 'Dean\ChatController@postCreate '); //
  Route::get('/chats/manage', 'Dean\ChatController@getmanage'); //
  Route::post('/chats/manage', 'Dean\ChatController@postmanage'); //
  Route::post('/chats/delete', 'Dean\ChatController@Delete'); //
});
//
//Route group for Lecturers
//
Route::group(['middleware' => ['auth', 'role:lecturer'], 'prefix' => '/lecturer'], function () {

  Route::get('/registered', 'Lecturer\IndexController@getRegistered'); //
  Route::post('/registered', 'Lecturer\IndexController@postRegistered'); //

  Route::get('/', 'Lecturer\IndexController@getIndex'); //

  Route::get('/chats', 'Dean\ChatController@getIndex'); //
  Route::get('/chats/create', 'Dean\ChatController@getCreate'); //
  Route::post('/chats/create', 'Dean\ChatController@postCreate '); //
  Route::get('/chats/manage', 'Dean\ChatController@getmanage'); //
  Route::post('/chats/manage', 'Dean\ChatController@postmanage'); //
  Route::post('/chats/delete', 'Dean\ChatController@Delete'); //
});
//
//Route group for Student
//
Route::group(['middleware' => ['auth', 'role:student'], 'prefix' => '/student'], function () {

  Route::get('/registered', 'Student\IndexController@getRegistered'); //
  Route::post('/registered', 'Student\IndexController@postRegistered'); //

  Route::get('/', 'Student\IndexController@getIndex'); //
  Route::get('/view_course', 'Student\IndexController@viewCourse'); //
  Route::post('/courses/join', 'Student\CourseController@joinCourse'); //

  Route::get('/courses', 'Student\CourseController@getIndex'); //
  Route::get('/course/view', 'Student\CourseController@getView'); //
  Route::post('/courses/edit', 'Student\CourseController@postEdit'); //
  Route::post('/courses/delete', 'Student\CourseController@Delete'); //

  Route::get('/modules', 'Student\ModuleController@getIndex'); //
  Route::get('/modules/add', 'Student\ModuleController@getAdd'); //
  Route::post('/modules/add', 'Student\ModuleController@postAdd'); //
  Route::get('/modules/edit', 'Student\ModuleController@getEdit'); //
  Route::post('/modules/edit', 'Student\ModuleController@postEdit'); //
  Route::post('/modules/delete', 'Student\ModuleController@Delete'); //

  Route::get('/chats', 'Student\ChatController@getIndex'); //
  Route::get('/chat/join', 'Student\ChatController@getCreate'); //
  Route::get('/chat/messages', 'Student\ChatController@postCreate '); //
  Route::post('/chats/messages/update', 'Student\ChatController@postmanage'); //
  Route::post('/chats/message/post', 'Student\ChatController@getmanage'); //
  Route::post('/chats/delete', 'Student\ChatController@Delete'); //
});
