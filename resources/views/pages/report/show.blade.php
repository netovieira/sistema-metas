@section('css')
    <link rel="stylesheet" href="{{ url('/') }}/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
@endsection
@section('scripts')

    <script src="{{ url('/') }}/plugins/input-mask/jquery.inputmask.js"></script>
    <script src="{{ url('/') }}/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="{{ url('/') }}/plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{ url('/') }}/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
@endsection

@extends('pages.shared.update')

@section('PageTitle')
    <h1>
        Novo Relatório
    </h1>
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Acesso rápido</a></li>
        <li>Metas</li>
        <li class="active">Novo relatório</li>
    </ol>
@endsection

@section('form')
    <!-- Default box -->
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">
                Relatório de metas de {!! $report->reference !!}
            </h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-xs-12">
                    <p><b>Entregue em:</b></p>
                    <p>{!! date('d/m/Y', strtotime($report->created_at)) !!}</p>
                </div>
            </div>
            @if($report->created_at < $report->updated_at)
                <div class="row">
                    <div class="col-xs-12">
                        <p><b>Avaliado em:</b></p>
                        <p>{!! date('d/m/Y', strtotime($report->created_at)) !!}</p>
                    </div>
                </div>
            @endif
        </div>
        @foreach($report->Items()->get() as $item)
            <div class="row">
                <div class="col-xs-12">
                    <div class="col-md-5 col-lg-4 col-xs-12">
                        <p><b>{!! $item->Goal()->name !!}</b></p>
                        <p>{!! $item->Goal()->description !!}</p>
                    </div>
                    <div class="col-md-5 col-lg-6 col-xs-12">
                        {!! $item->response !!}
                    </div>
                    <div class="col-md-2 col-lg-2 col-xs-12">
                        {!! $item->ratingText() !!}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <!-- /.box-body -->
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            $("[data-mask]").inputmask();
            $(".textarea").wysihtml5();

            $("input[name='reference']").on('change', function () {
                $('[data-input][input="reference"]').text($(this).val());
            });
        });
    </script>
@endsection
