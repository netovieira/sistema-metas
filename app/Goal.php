<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    protected $fillable = ['name', 'description', 'do_id', 'do_type'];
    protected $UpdateFields = [
        [
            'name'      => 'name',
            'label'     => 'Nome',
            'type'      => 'input',
            'required'  => true,
            'autofocus' => true
        ],
        [
            'name'      => 'description',
            'label'     => 'Descrição',
            'type'      => 'text',
            'required'  => true,
            'autofocus' => false
        ],
        [
            'name'      => 'do_type',
            'label'     => 'Referente à',
            'type'      => 'select',
            'options'   => [
                'lookup' => 'types',
                'key' => 'id',
                'value' => 'name'
            ],
            'required'  => true,
            'autofocus' => false,
        ],
        [
            'dependent' => [
                'field' => 'do_type',
                'value' => 'App\User',
            ],
            'name'      => 'do_id',
            'label'     => 'Funcionário',
            'type'      => 'select',
            'options'   => [
                'lookup' => 'lookupUser',
                'key' => 'id',
                'value' => 'name'
            ],
            'required'  => true,
            'autofocus' => false,
        ],
        [
            'dependent' => [
                'field' => 'do_type',
                'value' => 'App\Office',
            ],
            'name'      => 'do_id',
            'label'     => 'Cargo',
            'type'      => 'select',
            'options'   => [
                'lookup' => 'lookupOffice',
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
            'value' => 'description',
            'label' => 'Descrição',
        ],
        [
            'value' => 'sub',
            'sub'   => [
                'data' => 'users',
                'fields' => [
                    [ 'label' => 'Nome', 'name'  => 'name' ],
                    [ 'label' => 'E-mail', 'name'  => 'email' ],
                ],
            ],
        ],
    ];

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
