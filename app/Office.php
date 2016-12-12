<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    protected $fillable = ['name', 'boss_id'];


    public function Goals(){
        return $this->morphMany('App\Goal', 'do')->get();
    }
    public function boss(){
        return $this->belongsTo('App\Office')->first();
    }
    public function users(){
        return $this->hasMany('App\User')->get();
    }
}
