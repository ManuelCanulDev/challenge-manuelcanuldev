@extends('layouts.app')

@section('template_title')
    {{ $socio->name ?? 'Ver Socio' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Ver Socio</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('socios.index') }}"> Volver</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Dni:</strong>
                            {{ $socio->DNI }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $socio->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Apellido:</strong>
                            {{ $socio->apellido }}
                        </div>
                        <div class="form-group">
                            <strong>Alta:</strong>
                            {{ $socio->alta }}
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            @foreach ($socio->reservas as $reserva)
                                <ol>
                                    <li>
                                        {{ "RESERVA ID: ".$reserva->id." CON FECHA DE :".$reserva->fecha_reserva }}
                                        <ul>
                                            @foreach ($reserva->butacas as $butaca)
                                                {{ "ID BUTACA: ".$butaca->id." | COLUMNA: ".$butaca->butaca_columna." | FILA: ".$butaca->butaca_fila }}
                                            @endforeach
                                        </ul>
                                    </li>
                                </ol>
                            @endforeach
                        </div>
                    </div>

                    <div class="row">

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
