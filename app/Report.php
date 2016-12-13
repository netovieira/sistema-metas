<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [ 'reference', 'score', 'user_id' ];
    //
    public function Items(){
        return $this->hasMany('App\ReportItem');
    }

    public function User(){
        return $this->hasOne('App\User')->first();
    }
}
