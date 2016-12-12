<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ url('/') }}/img/avatar5.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <!-- Status -->
                <a href="javascript:void(0);">{{ Auth::user()->Office()->name }}</a>
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
            <li class="{{ Request::is( '/') ? 'active' : '' }}">
                <a href="{!! url('/')   !!}"><i class="fa fa-dashboard"></i> <span>Acesso rápido</span></a>
            </li>
            {!! Request::is("/relatorios/*") !!}
            <li class="treeview {{ Request::is( 'relatorios*') ? 'active' : '' }}">
                <a href="#"><i class="fa fa-file-text-o"></i> <span>Relatórios</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li class="treeview {{ Request::is( 'relatorios') ? 'active' : '' }}">
                        <a href="{!! url('/relatorios')   !!}"><i class="fa fa-circle-o"></i> Relatórios</a></li>
                    <li class="treeview {{ Request::is( 'relatorios/create') ? 'active' : '' }}">
                        <a href="{!! url('/relatorios/create')  !!}"><i class="fa fa-circle-o"></i> Novo relatório</a></li>
                    <li class="treeview {{ Request::is( 'relatorios/summary') ? 'active' : '' }}">
                        <a href="{!! url('/relatorios/summary') !!}"><i class="fa fa-circle-o"></i> Resumo</a></li>
                </ul>
            </li>
            <li class="treeview {{ Request::is( 'anotacoes*') ? 'active' : '' }}">
                <a href="#"><i class="fa fa-sticky-note-o"></i> <span>Anotações</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li class="treeview {{ Request::is( 'anotacoes') ? 'active' : '' }}">
                        <a href="{!! url('/anotacoes') !!}"><i class="fa fa-circle-o"></i> Anotações</a></li>
                    <li class="treeview {{ Request::is( 'anotacoes/create') ? 'active' : '' }}">
                        <a href="{!! url('/anotacoes/create') !!}"><i class="fa fa-circle-o"></i> Nova anotação</a></li>
                </ul>
            </li>
            <li class="treeview {{ Request::is( 'mentoria*') ? 'active' : '' }}">
                <a href="javascript:void (0)"><i class="fa fa-graduation-cap"></i> <span>Mentor/Mentee</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li class="treeview {{ Request::is( 'mentoria') ? 'active' : '' }}">
                        <a href="{!! url('/mm') !!}"><i class="fa fa-circle-o"></i> Mentor/Mentee's</a></li>
                    <li class="treeview {{ Request::is( 'mentoria/create') ? 'active' : '' }}">
                        <a href="{!! url('/mm/create') !!}"><i class="fa fa-circle-o"></i> Crie um novo!</a></li>
                </ul>
            </li>

            @if( is_null(Auth::user()->Office()->boss_id) )
                <li class="treeview {{ Request::is( 'metas*') ? 'active' : '' }}">
                    <a href="#">
                        <i class="fa fa-bar-chart"></i> <span>Metas</span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="treeview {{ Request::is( 'metas') ? 'active' : '' }}">
                            <a href="{!! url('/metas') !!}"><i class="fa fa-circle-o"></i> Metas</a></li>
                        <li class="treeview {{ Request::is( 'metas/create') ? 'active' : '' }}">
                            <a href="{!! url('/metas/create') !!}"><i class="fa fa-circle-o"></i> Nova meta</a></li>
                    </ul>
                </li>
                <li class="treeview {{ Request::is( 'funcionarios*') ? 'active' : '' }}">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span>Metas</span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="treeview {{ Request::is( 'funcionarios') ? 'active' : '' }}">
                            <a href="{!! url('/funcionarios') !!}"><i class="fa fa-circle-o"></i> Funcionários</a></li>
                        <li class="treeview {{ Request::is( 'funcionarios/create') ? 'active' : '' }}">
                            <a href="{!! url('/funcionarios/create') !!}"><i class="fa fa-circle-o"></i> Novo funcionário</a></li>
                    </ul>
                </li>
                <li class="treeview {{ Request::is( 'cargos*') ? 'active' : '' }}">
                    <a href="#"><i class="fa fa-dashboard"></i> <span>Cargos</span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="treeview {{ Request::is( 'cargos') ? 'active' : '' }}">
                            <a href="{!! url('/cargos') !!}"><i class="fa fa-circle-o"></i> Mentor/Mentee's</a></li>
                        <li class="treeview {{ Request::is( 'cargos/create') ? 'active' : '' }}">
                            <a href="{!! url('/cargoscreate') !!}"><i class="fa fa-circle-o"></i> Crie um novo!</a></li>
                    </ul>
                </li>
            @endif
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
