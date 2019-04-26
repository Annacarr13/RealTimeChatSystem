<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
  //Table
  protected $table = 'courses';
  //Fillable columns in table
  protected $fillable = [
      'university_id',
      'title',
      'descripton',
      'leader_id',
      'access_key',
  ];

  public function leader() {
  		return $this->hasOne('App\User', 'foreign_key', 'leader_id');
  }

  public function uni() {
  		return $this->belongsTo('App\University', 'foreign_key', 'university_id');
  }

  public function modules() {
      return $this->hasMany('App\Module', 'foreign_key');
  }

  public function userCourse() {
      return $this->hasMany('App\UserCourse', 'foreign_key');
  }

}
