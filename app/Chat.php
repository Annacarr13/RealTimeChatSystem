<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
  //Table
  protected $table = 'chats';
  //Fillable columns in table
  protected $fillable = [
      'title',
      'description',
      'start_time',
      'duration',
      'module_id',
      'created_by',
  ];

  public function module()
  {
      return $this->belongsTo('App\Module', 'foreign_key');
  }

  public function chat()
  {
      return $this->hasMany('App\Chat', 'foreign_key');
  }

  public function lecturer()
  {
      return $this->belongsTo('App\User', 'foreign_key', 'created_by');
  }
}
