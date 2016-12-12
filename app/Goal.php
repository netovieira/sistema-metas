<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    protected $fillable = ['name', 'description', 'do_id', 'do_type'];

    public function owner(){
        return $this->morphTo('do')->first();
    }

    public function users(){
        if ( $this->do_type == 'App\User' ) {
            return $this->morphTo('do')->get();
        }else{
            return $this->member()->users();
        }
    }

    public function ReportItems(){
        return $this->hasMany('App\ReportItem');
    }

    public function lookupUser(){
        return User::all();
    }
    public function lookupOffice(){
        return Office::all();
    }
    public function types(){
        return [
            ['id' => 'App\Office', 'name' => 'Cargo'],
            ['id' => 'App\User' , 'name' => 'Funcionário'],
        ];
    }
}
