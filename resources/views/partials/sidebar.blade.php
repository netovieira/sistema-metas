<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="img/avatar5.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
{{--                <p>{{ Auth::user()->name }}</p>--}}
                <!-- Status -->
{{--                <!--<a href="javascript:void(0);">{{ Auth::user()->Office()->name }}</a>-->--}}
            </div>
        </div>

        <!-- search form (Optional) -->
        {{--<form action="#" method="get" class="sidebar-form">--}}
            {{--<div class="input-group">--}}
                {{--<input type="text" name="q" class="form-control" placeholder="Search...">--}}
                {{--<span class="input-group-btn">--}}
                {{--<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>--}}
                {{--</button>--}}
              {{--</span>--}}
            {{--</div>--}}
        {{--</form>--}}
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">NAVEGAÇÃO</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="@if(Request::is('/')) active  @endif">
                <a href="{!! url('/')   !!}"><i class="fa fa-dashboard"></i> <span>Acesso rápido</span></a>
            </li>
            <li class="treeview @if(Request::is('/relatorios') || Request::is("/relatorios/*")) active  @endif">
                <a href="#"><i class="fa fa-file-text-o"></i> <span>Relatórios</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li class="treeview @if(Request::is("/relatorios/index")) active  @endif">
                        <a href="{!! url('/relatorios/index')   !!}"><i class="fa fa-circle-o"></i> Relatórios</a></li>
                    <li class="treeview @if(Request::is("/relatorios/create")) active  @endif">
                        <a href="{!! url('/relatorios/create')  !!}"><i class="fa fa-circle-o"></i> Novo relatório</a></li>
                    <li class="treeview @if(Request::is("/relatorios/summary")) active  @endif">
                        <a href="{!! url('/relatorios/summary') !!}"><i class="fa fa-circle-o"></i> Resumo</a></li>
                </ul>
            </li>
            <li class="treeview @if(Request::is('/anotacoes') || Request::is("/anotacoes/*")) active  @endif">
                <a href="#"><i class="fa fa-sticky-note-o"></i> <span>Anotações</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li class="treeview @if(Request::is("/anotacoes/index")) active  @endif">
                        <a href="{!! url('/anotacoes/index') !!}"><i class="fa fa-circle-o"></i> Anotações</a></li>
                    <li class="treeview @if(Request::is("/anotacoes/create")) active  @endif">
                        <a href="{!! url('/anotacoes/create') !!}"><i class="fa fa-circle-o"></i> Nova anotação</a></li>
                </ul>
            </li>
            <li class="treeview @if(Request::is('/mm') || Request::is("/mm/*")) active  @endif">
                <a href="javascript:void (0)"><i class="fa fa-graduation-cap"></i> <span>Mentor/Mentee</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li class="treeview @if(Request::is("/mm/index")) active  @endif">
                        <a href="{!! url('/mm/index') !!}"><i class="fa fa-circle-o"></i> Mentor/Mentee's</a></li>
                    <li class="treeview @if(Request::is("/mm/create")) active  @endif">
                        <a href="{!! url('/mm/create') !!}"><i class="fa fa-circle-o"></i> Crie um novo!</a></li>
                </ul>
            </li>

{{--            @if( is_null(Auth::user()->Office()->boss_id) )--}}
                <li class="treeview @if(Request::is('/metas') || Request::is("/metas/*")) active  @endif">
                    <a href="#">
                        <i class="fa fa-bar-chart"></i> <span>Metas</span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="treeview @if(Request::is("/metas/index")) active  @endif">
                            <a href="{!! url('/metas/index') !!}"><i class="fa fa-circle-o"></i> Metas</a></li>
                        <li class="treeview @if(Request::is("/metas/create")) active  @endif">
                            <a href="{!! url('/metas/create') !!}"><i class="fa fa-circle-o"></i> Nova meta</a></li>
                    </ul>
                </li>
                <li class="treeview @if(Request::is('/funcionarios') || Request::is("/funcionarios/*")) active  @endif">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span>Metas</span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="treeview @if(Request::is("/funcionarios/index")) active  @endif">
                            <a href="{!! url('/funcionarios/index') !!}"><i class="fa fa-circle-o"></i> Funcionários</a></li>
                        <li class="treeview @if(Request::is("/funcionarios/create")) active  @endif">
                            <a href="{!! url('/funcionarios/create') !!}"><i class="fa fa-circle-o"></i> Novo funcionário</a></li>
                    </ul>
                </li>
                <li class="treeview @if(Request::is('/cargos') || Request::is("/cargos/*")) active  @endif">
                    <a href="#"><i class="fa fa-dashboard"></i> <span>Cargos</span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="treeview @if(Request::is("/cargos/index")) active  @endif">
                            <a href="{!! url('/cargos/index') !!}"><i class="fa fa-circle-o"></i> Mentor/Mentee's</a></li>
                        <li class="treeview @if(Request::is("/cargos/create")) active  @endif">
                            <a href="{!! url('/cargoscreate') !!}"><i class="fa fa-circle-o"></i> Crie um novo!</a></li>
                    </ul>
                </li>
            {{--@endif--}}
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
