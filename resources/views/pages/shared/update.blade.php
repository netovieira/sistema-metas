@extends('layouts.dashboard')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        @yield('PageTitle')
        @yield('breadcrumbs')
    </section>

    <!-- Main content -->
    <section class="content">
        @yield('form')
    </section>
    <!-- /.content -->

@endsection