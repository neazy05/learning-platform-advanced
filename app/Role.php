<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable=['role_en_name','role_description'];

    public $timestamps=false;

    public function users(){
        return $this->belongsToMany('App\User');
    }

}
