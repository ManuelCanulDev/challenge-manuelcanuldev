@extends('layouts.app')

@section('template_title')
    {{ $butaca->name ?? 'Ver Butaca' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Ver Butaca</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('butacas.index') }}"> Volver</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Reserva Id:</strong>
                            {{ $butaca->reserva->fecha_reserva }}
                        </div>
                        <div class="form-group">
                            <strong>Butaca Fila:</strong>
                            {{ $butaca->butaca_fila }}
                        </div>
                        <div class="form-group">
                            <strong>Butaca Columna:</strong>
                            {{ $butaca->butaca_columna }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
