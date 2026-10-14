<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment_attachment extends Model
{
    protected $fillable=['path','assignment_id'];


    public function assignment(){
        return $this->BelongsTo('App\Assignment');
    }
}
