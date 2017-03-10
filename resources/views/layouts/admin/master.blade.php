@extends('layouts.master')

@include('layouts.admin.nav')

@section('title')
    <title>Dashboard</title>
@endsection

@section('content')

    @include('layouts.admin.side')
    
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          @yield('board')
    </div>
    
@endsection