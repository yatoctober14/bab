<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jop extends Model
{
    use HasFactory;
    public function users(){
        return $this->hasMany('App\Models\User');
    }
    public function projects(){
        return $this->hasMany('App\Models\Project');
    }
}
