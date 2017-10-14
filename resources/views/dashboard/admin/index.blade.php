{{-- resources/views/admin/dashboard.blade.php --}}

@extends('layouts.app')

{{--@section('title', 'Dashboard')--}}

{{--@section('content_header')--}}
    {{--<h1>Dashboard</h1>--}}
{{--@stop--}}

@section('content')
    <p>Welcome to this beautiful admin panel.</p>

    @include('partials.search')
@stop

@section('css')
@stop

@section('scripts')
    <!-- jQuery 3.1.1 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>

    <!-- AdminLTE App -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.11/js/app.min.js"></script>
@stop
