@extends('layouts.app')

@section('contenido')
    <div class="content-header content-header-media">
        <div class="header-section">
            <div class="row">
                <!-- Main Title (hidden on small devices for the statistics to fit) -->
                <div class="col-md-4 col-lg-6 hidden-xs hidden-sm">
                    <h1>Bienvenido(a) <strong>{{ Auth::user()->name  }}</strong></h1>
                </div>
                <!-- END Main Title -->

                <!-- Top Stats -->
                <div class="col-md-12 col-lg-6">
                    <div class="row text-center">
                        <div class="col-xs-12 col-sm-6">
                            <h2 class="animation-hatch">
                                <strong>{{ $books->count()  }}</strong><br>
                                <small>Mis Libros</small>
                            </h2>
                        </div>
                        <div class="col-xs-4 col-sm-6">
                            <h2 class="animation-hatch">
                                <strong>{{ $exchange->count()  }}</strong><br>
                                <small>Mis intercambios</small>
                            </h2>
                        </div>
                        <!-- <div class="col-xs-4 col-sm-3">
                            <h2 class="animation-hatch">
                                <strong>101</strong><br>
                                <small><i class="fa fa-calendar-o"></i> Events</small>
                            </h2>
                        </div> -->
                        <!-- We hide the last stat to fit the other 3 on small devices -->
                        <!--<div class="col-sm-3 hidden-xs">
                            <h2 class="animation-hatch">
                                <strong>27&deg; C</strong><br>
                                <small><i class="fa fa-map-marker"></i> Sydney</small>
                            </h2>
                        </div>-->
                    </div>
                </div>
                <!-- END Top Stats -->
            </div>
        </div>
        <!-- For best results use an image with a resolution of 2560x248 pixels (You can also use a blurred image with ratio 10:1 - eg: 1000x100 pixels - it will adjust and look great!) -->
        <img src="{{ asset('img/placeholders/headers/dashboard_header.jpg') }}" alt="header image" class="animation-pulseSlow">
    </div>
    <!-- END Dashboard Header -->

    <!-- Mini Top Stats Row -->
    <div class="row">
        <div class="col-sm-6 col-lg-3">
            <!-- Widget -->
            <a href="{{ route('app.books.create')  }}" class="widget widget-hover-effect1">
                <div class="widget-simple">
                    <div class="widget-icon pull-left themed-background-autumn animation-fadeIn">
                        <i class="fa fa-file-text"></i>
                    </div>
                    <h3 class="widget-content text-right animation-pullDown">
                        Crear <strong>un nuevo Libro</strong><br>
                        <!-- <small>Mountain Trip</small> -->
                    </h3>
                </div>
            </a>
            <!-- END Widget -->
        </div>
        <!--<div class="col-sm-6 col-lg-3">
            <a href="page_comp_charts.html" class="widget widget-hover-effect1">
                <div class="widget-simple">
                    <div class="widget-icon pull-left themed-background-spring animation-fadeIn">
                        <i class="gi gi-usd"></i>
                    </div>
                    <h3 class="widget-content text-right animation-pullDown">
                        + <strong>250%</strong><br>
                        <small>Sales Today</small>
                    </h3>
                </div>
            </a>
        </div> -->

        <div class="col-sm-6 col-lg-3">
            <!-- Widget -->
            <a href="page_ready_inbox.html" class="widget widget-hover-effect1">
                <div class="widget-simple">
                    <div class="widget-icon pull-left themed-background-fire animation-fadeIn">
                        <i class="gi gi-envelope"></i>
                    </div>
                    <h3 class="widget-content text-right animation-pullDown">
                        {{ $solicitudes  }} <strong>Solicitudes Pendientes</strong>
                    </h3>
                </div>
            </a>
            <!-- END Widget -->
        </div>

        <!--<div class="col-sm-6 col-lg-3">
            <a href="page_comp_gallery.html" class="widget widget-hover-effect1">
                <div class="widget-simple">
                    <div class="widget-icon pull-left themed-background-amethyst animation-fadeIn">
                        <i class="gi gi-picture"></i>
                    </div>
                    <h3 class="widget-content text-right animation-pullDown">
                        +30 <strong>Photos</strong>
                        <small>Gallery</small>
                    </h3>
                </div>
            </a>
        </div>-->
    </div>

@endsection
