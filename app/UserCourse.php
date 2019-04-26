<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserCourse extends Model
{
    //Table
    protected $table = 'users_courses';
    //Fillable columns in table
    protected $fillable = [
        'user_id',
        'course_id',
    ];

    public function course()
    {
        return $this->belongsTo('App\Course', 'foreign_key', 'course_id');
    }
    public function user()
    {
        return $this->belongsTo('App\User', 'foreign_key', 'user_id');
    }
}
