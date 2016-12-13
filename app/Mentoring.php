<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mentoring extends Model
{
    //
    public function Mentor(){
        return $this->belongsTo('App\User', 'mentor_id')->first();
    }
    public function Mentee(){
        return $this->belongsTo('App\User', 'mentee_id')->first();
    }
}
