<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    //Table
    protected $table = 'universities';
    //Fillable columns in table
    protected $fillable = [
        'name',
        'city',
        'county',
        'country',
        'user_id',
    ];

    public function module() {
        return $this->hasMany('App\Course', 'foreign_key');
      }
    public function dean()
    {
        return $this->hasOne('App\User');
    }

}
