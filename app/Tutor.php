<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Tutor extends Model
{
    use SoftDeletes;

    protected $fillable = ['tutor_diploma', 'tutor_cv', 'user_id'];


    public function getTutorCvAttribute($value)
    {

        if (isset($value)) {
            $splits_path = preg_split("/uploads/", $value);
            $splits_path = preg_replace('[\\\\]', '/', $splits_path);
            return "/uploads" . $splits_path[count($splits_path) - 1];
        } else {
            return $value;
        }
    }

    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function courses()
    {
        return $this->hasMany('App\Course');
    }

    public function assignments()
    {
        return $this->hasMany('App\Assignment');
    }

    public function lectures()
    {
        return $this->hasMany('App\Lecture');
    }

}
