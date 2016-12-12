@extends('pages.shared.index')

@section('PageTitle')
    <h1>
        Relatórios
    </h1>
@stop
@section('breadcrumbs')
    <ol class="breadcrumb">
        <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Acesso rápido</a></li>
        <li>Metas</li>
        <li class="active">Relatórios enviados</li>
    </ol>
@stop
@section('fastAccess')
    <a class="btn btn-app" href="{{ url('/relatorios/create') }}" style="margin: 0;">
        <i class="fa fa-file"></i>
        Novo relatório
    </a>
@stop
@section('thead')
    <th>Referência</th>
    <th>Data entrega</th>
    <th>Data avaliação</th>
    <th>Pontuação</th>
@stop
@section('tbody')
    <tr>
        <td>11/16</td>
        <td>04/11/2016</td>
        <td>10/11/2016</td>
        <td>120/100</td>
    </tr>
@stop