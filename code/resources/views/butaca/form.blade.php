<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('reserva_id') }}
            {{ Form::select('reserva_id', $reservas,$elegido, ['class' => 'form-control' . ($errors->has('reserva_id') ? ' is-invalid' : ''), 'placeholder' => 'Reserva Id']) }}
            {!! $errors->first('reserva_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('butaca_fila') }}
            {{ Form::text('butaca_fila', $butaca->butaca_fila, ['class' => 'form-control' . ($errors->has('butaca_fila') ? ' is-invalid' : ''), 'placeholder' => 'Butaca Fila']) }}
            {!! $errors->first('butaca_fila', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('butaca_columna') }}
            {{ Form::text('butaca_columna', $butaca->butaca_columna, ['class' => 'form-control' . ($errors->has('butaca_columna') ? ' is-invalid' : ''), 'placeholder' => 'Butaca Columna']) }}
            {!! $errors->first('butaca_columna', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Ejecutar</button>
    </div>
</div>
