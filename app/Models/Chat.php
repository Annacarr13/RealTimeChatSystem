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
}
