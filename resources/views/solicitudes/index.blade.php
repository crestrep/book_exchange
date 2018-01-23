@extends('layouts.app')

@section('contenido')
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="gi gi-shopping_cart"></i>Gestion de Solicitudes<br>
                <small>Administracion de Solicitudes</small>
            </h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 pull-right">
            <!-- Inicio Buscador -->
            {!! Form::open(['route' => 'app.exchange.index', 'method' => 'GET']) !!}
            <div class="input-group">
                <input type="text" class="form-control" name="buscar" placeholder="Buscar libro" value="{{ $search }}">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
            </div>
            {!! Form::close() !!}
                    <!-- Fin buscador -->
        </div>
    </div>
    <br>

    <table class="block block-content table table-vcenter table-striped">
        <thead>
        <tr>
            <th class="text-center">Titulo</th>
            <th>Autor</th>
            <th class="text-center">Propietario</th>
            <th class="text-center">Estado</th>
            <th style="width: 150px;" class="text-center">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($exchanges as $exchange)
            @php
                $class = '';
                if($exchange->state == 'En Espera') $class='label label-warning';
                if($exchange->state == 'Enviado') $class='label label-default';
                if($exchange->state == 'Recibido') $class='label label-success';
            @endphp

            <tr>
                @foreach($exchange->book as $book)
                    <td class="text-center"> {{ $book->name  }}</td>
                    <td>{{ $book->author  }}</td>
                    <td class="text-center">{{ $book->user->name  }}</td>
                @endforeach
                <td class="text-center"><div class="{{ $class  }}">{{ $exchange->state }}</div></td>
                <td class="text-center">
                    <div class="btn-group btn-group-xs">
                        <a href="@if($exchange->state == 'Enviado' ) {{ route('app.exchange.received', $exchange->id)  }} @else javascript:void(0) @endif " data-toggle="tooltip" title="Libro Recibido" class="btn btn-default view" @if(!($exchange->state == 'Enviado')) disabled="disabled" @endif ><i class="fa fa-check text-success"></i></a>
                        <a href="@if($exchange->state == 'En Espera') {{ route('app.exchange.canceled', $exchange->id)  }} @else javascript:void(0) @endif " data-toggle="tooltip" title="Cancelar Intercambio" class="btn btn-default view" @if(!($exchange->state == 'En Espera')) disabled="disabled" @else onclick="return confirm('Esta aseguro que deasea cancelar esta solicitud?');" @endif><i class="fa fa-times text-danger"></i></a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

