<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('socio_id') }}
            {{ Form::select('socio_id', $socios,$elegido, ['class' => 'form-control' . ($errors->has('socio_id') ? ' is-invalid' : ''), 'placeholder' => 'Socio Id']) }}
            {!! $errors->first('socio_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha_reserva') }}
            {{ Form::date('fecha_reserva', $reserva->fecha_reserva, ['class' => 'form-control' . ($errors->has('fecha_reserva') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Reserva']) }}
            {!! $errors->first('fecha_reserva', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Ejecutar</button>
    </div>
</div>
