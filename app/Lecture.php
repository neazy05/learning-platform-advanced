<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    protected $fillable=['title','description','tutor_id','course_id'];



    public function tutor(){
        return $this->belongsTo('App\Tutor');
    }



    public function course(){
        return $this->belongsTo('App\Course');
    }

    public function lecture_attachments(){
        return $this->hasMany('App\Lecture_attachment');
    }
}
