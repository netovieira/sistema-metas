@extends('layouts.dashboard', [ 'css' =>     [ ['link' => '../../plugins/datatables/dataTables.bootstrap.css'] ],
                                'scripts' => [ ['link' => '../../plugins/datatables/jquery.dataTables.min.js'],
                                               ['link' => '../../plugins/datatables/dataTables.bootstrap.min.js'] ]])

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        @yield('PageTitle')
        @yield('breadcrumbs')
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- acesso rapido -->
        <div class="box">
            <div class="box-body">
                @yield('fastAccess')
            </div>
        </div>

        <!-- Default box -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">
                    @yield('listTitle')
                </h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-bordred table-striped">
                    <thead>
                        @yield('thead')
                    </thead>
                    <tbody>
                        @yield('tbody')
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->

    <script type="text/javascript">
        $(function () {
            $("table").DataTable({
                language: {
                    "url": "../../plugins/datatables/lang/Portuguese-Brasil.json"
                }
            });
        });
    </script>

@stop