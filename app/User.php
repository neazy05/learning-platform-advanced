<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;


class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'mobile', 'avatar', 'provider_id', 'provider',
        'access_token'
    ];

    protected $dates = ['deleted_at'];

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


    public function getAvatarAttribute($value)
    {

        if (!Str::startsWith($value, 'http') && isset($value)) {
            $splits_path = preg_split("/uploads/", $value);
            $splits_path = preg_replace('[\\\\]', '/', $splits_path);

            return "/uploads" . $splits_path[count($splits_path) - 1];
        } else {
            return $value;
        }
    }

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }


    public function courses()
    {
        return $this->belongsToMany('App\Course')->withPivot('rating');
    }

    public function isTutor()
    {
        return $this->hasOne('App\Tutor');
    }

    public function student_assignments()
    {
        return $this->hasMany('App\Student_assignment');
    }

    public function chat_messages_globals()
    {
        return $this->hasMany('App\Chat_messages_global');
    }
}
