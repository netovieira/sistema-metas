<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'office_id',
    ];
    protected $UpdateFields = [
        [
            'name'      => 'name',
            'label'     => 'Nome',
            'type'      => 'input',
            'required'  => true,
            'autofocus' => true
        ],
        [
            'name'      => 'email',
            'label'     => 'E-mail',
            'type'      => 'input',
            'required'  => true,
            'autofocus' => false
        ],
        [
            'name'      => 'office_id',
            'label'     => 'Cargo',
            'type'      => 'select',
            'options'   => [
                'lookup' => 'lookupOffice',
                'key'    => 'id',
                'value'  => 'name'
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
            'value' => 'email',
            'label' => 'E-mail',
        ],
        [
            'value' => 'office_id',
            'label' => 'Cargo',
            'text'  => 'GetOfficeName',
        ],
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function Office(){
        return $this->belongsTo('App\Office')->first();
    }

    public function Goals(){
        $office = $this->Office()->Goals();
        return $this->morphMany('App\Goal', 'do')->get()->merge($office);
    }
    public function lookupOffice(){
        return Office::all();
    }
    public function GetOfficeName(){
        return $this->Office()->name;
    }
}
