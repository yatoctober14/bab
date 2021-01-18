<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    public function owner(){
        return $this->belongsTo('App\Models\User','owner_id');
    }
    public function offers(){
        return $this->hasMany('App\Models\Offer');
    }
    public function feedback(){
        return $this->hasOne('App\Models\Feedback');
    }
    public function jop(){
       return $this->belongsTo('App\Models\Jop');
    }
}
