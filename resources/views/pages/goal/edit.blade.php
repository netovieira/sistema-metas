@extends('pages.shared.update')

@section('PageTitle')
    <h1>
        Relatório {{ $report->id }}
    </h1>
@stop
@section('breadcrumbs')
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Acesso rápido</a></li>
        <li>Metas</li>
        <li class="active">Novo relatório</li>
    </ol>
@stop

@section('form')
    {!! Form::model($report, ['route' => ['report.update', $report->id]] !!}
    {!! Form::close() !!}
@stop