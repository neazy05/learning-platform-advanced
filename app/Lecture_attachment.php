<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lecture_attachment extends Model
{
    protected $fillable=['permissions','path','lecture_id'];


    public function lecture(){
        return $this->belongsTo('App\Lecture');
    }
}
