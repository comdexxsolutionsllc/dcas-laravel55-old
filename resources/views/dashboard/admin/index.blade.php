{{-- resources/views/admin/dashboard.blade.php --}}

@extends('layouts.app')

@section('css')
@endsection

@section('content')
    <p>Welcome to this beautiful admin panel.</p>

    @include('partials.search')
    @include('partials.user-online')
@stop
