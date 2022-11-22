@extends('layouts.app')

@section('template_title')
    {{ $socio->name ?? 'Show Socio' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Socio</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('socios.index') }}"> Back</a>
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
                </div>
            </div>
        </div>
    </section>
@endsection
