<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'password',
        'first_name',
        'last_name',
        'email_verified',
        'mobile',
        'mobile_verified',
        'university_id',
        'module_id',
        'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    /**
    * Relationships
    *
    * @var array
    */
    // public function course() {
    //   return $this->hasMany('App\Models\Course', 'co_id');
    // }

    public function uni()
    {
        return $this->belongsTo('App\University', 'foreign_key', 'user_id');
    }
    public function courseLeader()
    {
        return $this->belongsTo('App\Course', 'foreign_key', 'leader_id');
    }
    public function userCourse()
    {
        return $this->hasMany('App\UserCourse', 'foreign_key', 'user_id');
    }
    public function userMessage()
    {
        return $this->hasMany('App\Message', 'foreign_key', 'user_id');
    }
    public function moduleLeader()
    {
        return $this->hasMany('App\Module', 'foreign_key', 'leader_id');
    }
}
