@extends('layouts.app')

@section('contenido')
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="gi gi-shopping_cart"></i>Gestion de Intercambio de Libros<br>
                <small>Administracion de Intercambio de Libros</small>
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
            <th class="text-center">Disponible</th>
            <th class="text-center">Genero</th>
            <th style="width: 150px;" class="text-center">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @php $genre = array('1' => 'Drama', '2' => 'Comedia', '3' => 'Accion', '4' => 'Romantica', '5' => 'Novela'); @endphp
        @foreach($books as $book)
            <tr>
                <td class="text-center">{{ $book->name  }}</td>
                <td>{{ $book->author  }}</td>
                <td class="text-center">@if($book->available > 0) <div class="label label-success">Disponible</div>@else <div class="label label-danger">No Disponible</div> @endif</td>
                <td class="text-center">{{ $genre[$book->genre]  }}</td>
                <td class="text-center">
                    <div class="btn-group btn-group-xs">
                        <a data-id="{{ $book->id  }}" data-toggle="modal" href="#modal-detail-book" data-toggle="tooltip" title="Ver Detalle" class="btn btn-default view"><i class="fa fa-eye"></i></a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div id="modal-detail-book" class="modal fade modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="modal-title"><i class="fa fa-book"></i> <strong>Detalle del libro</strong></h3>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route' => 'app.exchange.store', 'method' => 'POST', 'class' => 'form-horizontal form-bordered']) !!}

                        <input type="hidden"  name="book_id">

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="minimum_spend">Propietario</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <p class="form-control-static name"></p>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Libros Disponibles</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <p class="form-control-static cant"></p>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Correo</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <p class="form-control-static correo"></p>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Fecha de Devolucion</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <input type="text"  name="date_end" class="form-control input-datepicker" data-date-format="dd/mm/yyyy" placeholder="dd/mm/yy" value="{{ old('date_end', date('d/m/Y')) }}">
                                </div>
                            </div>
                        </div>

                    </div>

                        <!--<div class="form-group">
                            <label class="col-md-3 control-label">Propietario</label>
                            <div class="col-md-9">
                                <p class="form-control-static name"></p>
                            </div>
                        </div> -->

                        <!-- <div class="form-group">
                            <label class="col-md-3 control-label">Correo</label>
                            <div class="col-md-9">
                                <p class="form-control-static correo"></p>
                            </div>
                        </div> -->

                        <!-- <div class="form-group">
                            <label class="col-md-3 control-label">Libros Disponibles</label>
                            <div class="col-md-9">
                                <p class="form-control-static cant"></p>
                            </div>
                        </div> -->

                        <?php /*<div class="form-group">
                            <label class="col-md-3 control-label">Fecha de Devolucion</label>
                            <div class="col-md-9">
                                <input type="text"  name="date_end" class="form-control input-datepicker" data-date-format="dd/mm/yyyy" placeholder="dd/mm/yy" value="{{ old('date_end', date('d/m/Y')) }}">
                            </div>
                        </div> */ ?>

                    <!-- Google map area -->
                    <div class="google-map-wrapper">
                        <div class="google-map" id="map" style="width:100%; height:350px;">
                            &nbsp;
                        </div>
                    </div>

                    <div class="modal-footer">
                        {!! Form::submit('Solicitar Libro', ['class' => 'btn btn-sm btn-primary']) !!}
                       <!-- <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Solicitar Libro</button> -->
                    </div>

                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>

@endsection

@section('loadjs')
    <script>

        function initMap() {
            var myLatLng = {lat: -33.4724727, lng: -70.9100268};

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 10,
                center: myLatLng
            });
        }

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAb6IKqhp9Gt9VK1i51tbJOyIUB1orxcjE&callback=initMap"></script>
    </body>

    <script>
        $('.view').on('click',function(){
            var id = $(this).data('id');
            $.ajax({
                method: 'GET',
                url: '{{ route('app.books.detail')  }}',
                data: { 'id': id},
                async: true,
                success: function(data)
                {
                    $('.modal').find('.modal-title').find('strong').empty();
                    $('.modal').find('.modal-title').find('strong').append(' '+data.data.name);
                    $('.modal').find('.form-group').find('.name').empty();
                    $('.modal').find('.form-group').find('.name').append(' '+data.user.name);
                    $('.modal').find('.form-group').find('.correo').empty();
                    $('.modal').find('.form-group').find('.correo').append(' '+data.user.email);
                    $('.modal').find('.form-group').find('.cant').empty();
                    $('.modal').find('.form-group').find('.cant').append(' '+data.data.available);
                    console.log(data.data.id);
                    $('.modal').find('.modal-body').find('input[name="book_id"]').val(data.data.id);
                    console.log($('.modal').find('.modal-body').find('input[name="book_id"]').val());
                    initMap();
                }
            });
        });
    </script>
@endsection
