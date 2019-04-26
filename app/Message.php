<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
  //Table
  protected $table = 'messages';
  //Fillable columns in table
  protected $fillable = [
      'chat_id',
      'user_id',
      'content_type',
      'content',
      'deleted',
      'deleted_by',
      'flagged',
      'flagged_by',
  ];

  public function chat()
  {
      return $this->belongsTo('App\Chat', 'foreign_key');
  }

  public function lecturer()
  {
      return $this->belongsTo('App\User', 'foreign_key');
  }
}
