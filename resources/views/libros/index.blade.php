@extends('layouts.app')

@section('contenido')
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="gi gi-shopping_cart"></i>Gestión de Libros<br>
                <small>Administración de Libros</small>
            </h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <a type="button" class="btn btn-sm btn-primary" href="{{ route('app.books.create') }}"><i class="fa fa-plus-circle"></i> Crear nuevo Libro</a>
        </div>
        <div class="col-md-4 pull-right">
            <!-- Inicio Buscador -->
            {!! Form::open(['route' => 'app.books.index', 'method' => 'GET']) !!}
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
            <th class="text-center">Cantidad</th>
            <th class="text-center">Genero</th>
            <th style="width: 150px;" class="text-center">Acciones</th>
        </tr>
        </thead>
        <tbody>
            @php $genre = array('1' => 'Drama', '2' => 'Comedia', '3' => 'Accion', '4' => 'Romantica', '5' => 'Novela'); @endphp
            @foreach($books as $book)
                <tr>
                    <td class="text-center"><a href="{{ route('app.books.edit', $book->id)  }}" title="Editar Libro">{{ $book->name  }}</a></td>
                    <td>{{ $book->author  }}</td>
                    <td class="text-center">{{ $book->quantity  }}</td>
                    <td class="text-center">{{ $genre[$book->genre]  }}</td>
                    <td class="text-center">
                        <div class="btn-group btn-group-xs">
                            <a href="{{ route('app.books.edit', $book->id)  }}" data-toggle="tooltip" title="Editar producto" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                            <a  onclick="return confirm('Los productos no se pueden eliminar');" data-toggle="tooltip" title="Eliminar producto" class="btn btn-danger"><i class="fa fa-times"></i></a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
