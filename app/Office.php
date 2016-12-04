<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    protected $fillable = ['name', 'boss_id'];
    protected $UpdateFields = [
        [
            'name'      => 'name',
            'label'     => 'Nome',
            'type'      => 'input',
            'required'  => true,
            'autofocus' => true
        ],
        [
            'name'      => 'boss_id',
            'label'     => 'Cargo responsável',
            'type'      => 'select',
            'options'   => [
                'lookup' => 'boss',
                'key' => 'id',
                'value' => 'name'
            ],
            'required'  => true,
            'autofocus' => false,
        ],
    ];
    protected $ExibitionFields = [
        [
            'value' => 'name',
            'label' => 'Nome',
        ],
        [
            'value' => 'boss',
            'label' => 'Cargo responsável',
        ],
        [
            'value' => 'sub',
            'sub'   =>[
                'data' => 'users',
                'fields' => [
                    [ 'label' => 'Nome', 'name'  => 'name' ],
                    [ 'label' => 'E-mail', 'name'  => 'email' ],
                ],
            ],
        ],
    ];

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
