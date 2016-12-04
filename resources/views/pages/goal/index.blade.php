@extends('layouts.dashboard', [ 'css' =>     [ ['link' => '../../plugins/datatables/dataTables.bootstrap.css'] ],
                                'scripts' => [ ['link' => '../../plugins/datatables/jquery.dataTables.min.js'],
                                               ['link' => '../../plugins/datatables/dataTables.bootstrap.min.js'] ]])

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Relatórios
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Acesso rápido</a></li>
            <li class="active">Metas</li>
            <li>Relatórios enviados</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- acesso rapido -->
        <div class="box">
            <div class="box-body">
                <a class="btn btn-app" style="margin: 0;">
                    <i class="fa fa-file"></i>
                    Novo relatório
                </a>
            </div>
        </div>

        <!-- Default box -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Relatórios enviados</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <table id="relatorios" class="table table-bordred table-striped">
                    <thead>
                        <th>Referência</th>
                        <th>Data entrega</th>
                        <th>Data avaliação</th>
                        <th>Pontuação</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>11/16</td>
                            <td>04/11/2016</td>
                            <td>10/11/2016</td>
                            <td>120/100</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                Footer
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->

    <script type="text/javascript">
        $(function () {
            $("#relatorios").DataTable({
                language: {
                    "url": "../../plugins/datatables/lang/Portuguese-Brasil.json"
                }
            });
        });
    </script>

    @stop