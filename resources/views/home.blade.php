@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Panel administrativo</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Hola mundo</h1>
        </div>

        <div class="card-body">
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident mollitia, laborum magnam ut numquam rem ad quas
                omnis tempore dolore rerum id perspiciatis qui adipisci aperiam facere et incidunt distinctio!
            </p>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
