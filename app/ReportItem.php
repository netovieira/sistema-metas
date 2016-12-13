<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ReportItem extends Model
{
    //
    protected $fillable = ['report_id', 'goal_id', 'response', 'rating'];

    public function Report(){
        return $this->hasOne('App\Report')->first();
    }
    public function Goal(){
        return $this->belongsTo('App\Goal')->first();
    }
    public function ratingText(){
        switch ($this->rating)
        {
            case 'N':
                return 'Não cumpriu';
                break;
            case 'C':
                return 'Cumpriu';
                break;
            case 'S':
                return 'Superou';
                break;
        }
    }
}
