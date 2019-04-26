<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
  //Table
  protected $table = 'modules';
  //Fillable columns in table
  protected $fillable = [
      'course_id',
      'title',
      'description',
      'leader_id',
  ];

  public function course()
  {
      return $this->belongsTo('App\Course', 'foreign_key');
  }
  public function leader()
  {
      return $this->belongsTo('App\User', 'foreign_key', 'leader_id');
  }

  public function chat()
  {
      return $this->hasMany('App\Chat', 'foreign_key');
  }
}
