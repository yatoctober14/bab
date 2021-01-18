<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    public function project(){
        return $this->belongsTo('App\Models\Project');
     }
     public function owner(){
        return $this->belongsTo('App\Models\User','owner_id');
     }
     public function worker(){
        return $this->belongsTo('App\Models\User','worker_id');
     }
}
