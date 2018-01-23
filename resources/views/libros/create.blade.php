@extends('layouts.app')

@section('contenido')

    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="fa fa-user"></i><strong>Gestión de Libros</strong>
                <br>
                <small>Administra los libros registrados en la base de datos</small>
            </h1>
        </div>
    </div>

    {!! Form::open(['route' => 'app.books.store', 'method' => 'POST', 'id'=>'appForm', 'class' => 'form-horizontal']) !!}

    <div class="row">
        <div class="col-md-6 text-left">
            <a type="button" class="btn btn-sm btn-info" href="{{ route('app.books.index') }}"><i class="fa fa-arrow-left"></i> Volver a la lista de libros</a>
        </div>
        <div class="col-md-6 text-right">
            <div class="form-group form-actions">
                <div class="col-md-9 col-md-offset-3">
                    <a href="{{ route('app.books.index') }}" class="btn btn-sm btn-warning">Cancelar</a>
                    {!! Form::submit('Crear Libro', ['class' => 'btn btn-sm btn-primary']) !!}
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="block">
                <div class="block-title">
                    <h2><strong>Información</strong> del Libro</h2>
                </div>

                @if(count($errors) > 0)
                    <div class="alert alert-danger alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <h4><i class="fa fa-times-circle"></i> Error</h4>
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {!! Form::open(['route' => 'app.books.store', 'method' => 'POST', 'class' => 'form-horizontal form-bordered']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Nombre', ['class' => 'col-md-3 control-label']) !!}
                    <div class="col-md-9">
                        {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'Nombre del libro'], 'required') !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('author', 'Autor', ['class' => 'col-md-3 control-label']) !!}
                    <div class="col-md-9">
                        {!! Form::text('author', old('author'), ['class' => 'form-control', 'placeholder' => 'Autor del libro'], 'required') !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('quantity', 'Cantidad', ['class' => 'col-md-3 control-label']) !!}
                    <div class="col-md-9">
                        {!! Form::number('quantity', old('quantity'), ['class' => 'form-control', 'placeholder' => 'Cantidad de libros'], 'required') !!}
                    </div>
                </div>

                <div class="form-group">
                    <label for="name" class="col-md-3 control-label">Genero</label>
                    <div class="col-md-9">
                        {!! Form::select('genre', array('1' => 'Drama', '2' => 'Comedia', '3' => 'Accion', '4' => 'Romantica', '5' => 'Novela'), old('genre'), ['class' => 'select-chosen', 'data-placeholder' => 'Seleccione']) !!}
                    </div>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>

    {!! Form::close() !!}

@endsection