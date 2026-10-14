<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable=['course_en_name','course_nickname','course_code','course_image','course_rating',
        'category_id','tutor_id'];

    public function getCourseImageAttribute($value)
    {

        if (isset($value)) {
            $splits_path = preg_split("/uploads/", $value);
            $splits_path = preg_replace('[\\\\]', '/', $splits_path);

            return "/uploads" . $splits_path[count($splits_path) - 1];
        } else {
            return $value;
        }
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function tutor(){
        return $this->belongsTo('App\Tutor');
    }

    public function users(){
        return $this->belongsToMany('App\User')->withPivot('rating');
    }

    public function assignments(){
        return $this->hasMany('App\Assignment');
    }


    public function student_assignments(){
        return $this->hasMany('App\Student_assignment');
    }



    public function lectures(){
        return $this->hasMany('App\Lecture');
    }


}
