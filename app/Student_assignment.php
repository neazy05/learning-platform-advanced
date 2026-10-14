<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student_assignment extends Model
{
    protected $fillable = [
        'path', 'grade', 'feedback','user_id','course_id'
    ];



    public function user(){
        return $this->BelongsTo('App\User');
    }

    public function course(){
        return $this->BelongsTo('App\Course');
    }
}
