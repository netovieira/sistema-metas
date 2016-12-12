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
                Relatório de metas de <span data-input input="reference">{!! \Carbon\Carbon::now()->format('m/Y') !!}</span>
            </h3>
        </div>
        <div class="box-body">
            {!! Form::open(['route' => 'relatorios.store', 'method' => 'post', 'id' => 'report']) !!}
                <div class="row">
                    <div class="col-md-3 col-lg-1 col-xs-6 form-group">
                        <div class="form-group">
                            {{ Form::label('reference', 'Referência') }}
                            <input type="text" name="reference" class="form-control" value="{!! \Carbon\Carbon::now()->format('m/Y') !!}" data-inputmask="'alias': 'mm/yyyy'" data-mask>
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-1 col-xs-6 form-group">
                        <div class="form-group">
                            {{ Form::label('created_at', 'Data entrega') }}
                            <input type="text" name="created_at" class="form-control" value="{!! \Carbon\Carbon::now()->format('d/m/Y') !!}" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask disabled>
                        </div>
                    </div>
                </div>
            {!! Form::hidden('items') !!}
            {!! Form::close() !!}
            <span style="display: none;">{{ $i = 1 }}</span>
            <span id="goals">
                @foreach(Auth::user()->Goals() as $goal)
                    <div class="row">
                        <form name="item{!! $i++ !!}">
                            <div class="col-md-6 col-lg-4 col-xs-12">
                                <p><b>{!! $goal->name !!}</b></p>
                                <p>{!! $goal->description !!}</p>
                            </div>
                            <div class="col-md-6 col-lg-8 col-xs-12">
                                <textarea class="textarea" name="response" style="width: 100%"></textarea>
                            </div>
                            {!! Form::hidden('goal_id', $goal->id) !!}
                        </form>
                    </div>
                @endforeach
            </span>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <button type="submit" data-submit form="#report" class="btn btn-primary">Enviar relatório</button>
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

            $('[data-submit]').on('click', function (event) {
                event.preventDefault();
                var form = $(this).attr('form');
                var items = [];
                $('#goals form').each(function (index) {
                    $(this).find('[name="_wysihtml5_mode"]').remove();
                    items.push($(this).serializeArray());
                });
                items = JSON.stringify(items);
                $(form).find('[name="items"]').val(items);
                $(form).submit();
            })
        });
    </script>
@endsection
