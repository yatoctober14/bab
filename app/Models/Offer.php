<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    
    public function worker(){
        return $this->belongsTo('App\Models\User','worker_id');
    }
    public function project(){
        return $this->belongsTo('App\Models\Project');
    }
}
