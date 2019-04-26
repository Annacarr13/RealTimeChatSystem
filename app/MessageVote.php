<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MessageVote extends Model
{
  //Table
  protected $table = 'message_votes';
  //Fillable columns in table
  protected $fillable = [
      'message_id',
      'user_id',
      'upvote',
  ];
}
