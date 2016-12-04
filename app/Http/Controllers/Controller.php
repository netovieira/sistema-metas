<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Exception;
use Illuminate\Support\Facades\Log;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $obj, //Contém Model atual
              $modelName, //Nome do model
              $path; //Caminho views


    private function FindRegister($id){
        try{
            $this->obj::findOrFail($id);
        }
        catch (Exception $e){
            return $this->RegisterLog($e, $this->modelName.' não encontrado(a)!');
        }
    }

    private function RegisterLog(Exception $e, $CustomError){
        Log::error('Code: '.$e->getCode() . ' :: Line: '.$e->getLine() . ' :: Message: '.$e->getMessage());
        return $CustomError;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected function index()
    {
        return view($this->path.'.index', compact( $this->obj::all() ) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected function create()
    {
        return view($this->path . '.create', ['fields' => $this->obj->UpdateFields] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function store(Request $request, $createObj = true)
    {
        try {
            if ( $createObj ) $model = new $this->obj;
            $model->update($request->all());
            $model->save();
        }catch (Exception $e){
            $this->RegisterLog($e, 'Ocorreu um erro ao tentar gravar o registro!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    protected function show($id)
    {
        return view($this->path . '.show', [compact($this->obj::findOrFail($id)),
                                            'fields' => $this->obj->ExibitionFields]  );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    protected function edit($id)
    {
        return view($this->path . '.show', [compact($this->obj::findOrFail($id)),
                                            'fields' => $this->obj->UpdateFields]  );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    protected function update(Request $request, $id)
    {
        try {
            FindRegister($id);
            $this->obj->update($request->all());
            $this->obj->save();
        }
        catch (Exception $e){
            return $this->RegisterLog($e, 'Ocorreu um erro ao tentar atualizar o registro!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    protected function destroy($id)
    {
        try {
            $this->FindRegister($id);
            $this->obj->delete();
        }
        catch (Exception $e){
            return $this->RegisterLog($e,'Ocorreu um erro ao tentar remover o registro!');
        }
    }
}
