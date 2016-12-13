<?php

namespace App\Http\Controllers;

use App\Report;
use App\ReportItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{

    public function __construct(){
        $this->class = Report::class;
        $this->modelName = 'Relatório';
        $this->path = 'pages.report';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return parent::index();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return parent::create();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->createObj = false;
        $this->obj = new $this->class($request->all());
        $this->obj->user_id = Auth::user()->id;
        $items = json_decode($request->all()['items']);
        unset($request->items);
        $is = array();
        $this->obj->save();

        foreach ($items as $arr) {
            $i = array();
            foreach ($arr as $item){
                $i[$item->name] = $item->value;
            }
            $i['report_id'] = $this->obj->id;
            array_push($is, $i);
        }

        $this->obj->Items()->saveMany(array_map(function ($it) {
            return new ReportItem($it);
        }, $is));

        $this->show($this->obj->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return parent::show($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return parent::edit($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return parent::update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return parent::destroy($id);
    }
}

