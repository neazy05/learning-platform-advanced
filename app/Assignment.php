<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Assignment extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title', 'description', 'course_id','user_id','tutor_id'
    ];

    protected $dates=['deleted_at'];



    public function tutor(){
        return $this->BelongsTo('App\Tutor');
    }

    public function course(){
        return $this->BelongsTo('App\Course');
    }

    public function assignment_attachments(){
        return $this->hasMany('App\Assignment_attachment');
    }
}
