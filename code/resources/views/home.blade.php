@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                @auth
                                    <a class="nav-link" href="{{ URL::to('socios') }}">{{ __('Socios') }}</a>
                                @endauth
                            </div>

                            <div class="col-md-4">
                                @auth
                                    <a class="nav-link" href="{{ URL::to('reservas') }}">{{ __('Reservas') }}</a>
                                @endauth
                            </div>

                            <div class="col-md-4">
                                @auth
                                    <a class="nav-link" href="{{ URL::to('butacas') }}">{{ __('Butacas') }}</a>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
