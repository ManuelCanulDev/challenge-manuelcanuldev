<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('socio_id') }}
            {{ Form::text('socio_id', $reserva->socio_id, ['class' => 'form-control' . ($errors->has('socio_id') ? ' is-invalid' : ''), 'placeholder' => 'Socio Id']) }}
            {!! $errors->first('socio_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha_reserva') }}
            {{ Form::text('fecha_reserva', $reserva->fecha_reserva, ['class' => 'form-control' . ($errors->has('fecha_reserva') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Reserva']) }}
            {!! $errors->first('fecha_reserva', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>