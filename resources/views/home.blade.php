@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/0.11.1/trix.css" />
@endsection

@section('content')
    <div class="container">
        <div class="row">
            @IsNotNull($domain)
            <h4>Your domain is {{$domain}}.</h4>
            @endIsNotNull

            <div class="row">
                <div class="panel panel-default">
                    <wysiwyg name="body"></wysiwyg>
                </div>
            </div>
        </div>
    </div>
@endsection
