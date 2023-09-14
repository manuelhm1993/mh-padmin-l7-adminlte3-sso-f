@extends('adminlte::page')

@section('title', 'Dashboard')

{{-- Activar el plugin sweetalert2 en esta vista --}}
{{-- @section('plugins.Sweetalert2', true) --}}

@section('content_header')
    <h1>Panel administrativo</h1>
@stop

@section('content')
    @for ($i = 0; $i < 10; $i++)
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
    @endfor
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        Swal.fire(
            'Good job!',
            'You clicked the button!',
            'success'
        )
    </script>
@stop
