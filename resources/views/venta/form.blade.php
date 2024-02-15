<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            <label for="tipo_tramite"><i class="bi bi-keyboard"></i> Tipo de Trámite</label>
            <select name="tipo_tramite" id="tipo_tramite" class="form-control{{ $errors->has('tipo_tramite') ? ' is-invalid' : '' }}">
                <option value="" selected disabled>Seleccioná un tipo de trámite</option>
                <option value="MULTAS">Multas</option>
                <option value="AySA">AySA</option>
                <option value="VISA">VISA</option>
                <!-- Agrega más opciones según sea necesario -->
            </select>
            {!! $errors->first('tipo_tramite', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            <label for="cliente"><i class="bi bi-person"></i> Cliente</label>
            {{ Form::text('cliente', $venta->cliente, ['class' => 'form-control' . ($errors->has('cliente') ? ' is-invalid' : ''), 'placeholder' => 'Cliente']) }}
            {!! $errors->first('cliente', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <label for="costo"><i class="bi bi-bank"></i> Costo</label>
            {{ Form::text('costo', $venta->costo, ['class' => 'form-control' . ($errors->has('costo') ? ' is-invalid' : ''), 'placeholder' => 'Costo', 'required' => false]) }}
            {!! $errors->first('costo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <label for="precio_venta"><i class="bi bi-cash-coin"></i> Precio de Venta</label>
            {{ Form::text('precio_venta', $venta->precio_venta, ['class' => 'form-control' . ($errors->has('precio_venta') ? ' is-invalid' : ''), 'placeholder' => 'Precio Venta']) }}
            {!! $errors->first('precio_venta', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <label for="estado"><i class="bi bi-hourglass-split"></i> Estado del trámite</label>
            <select name="estado" id="estado" class="form-control{{ $errors->has('estado') ? ' is-invalid' : '' }}">
                <option value="" selected disabled>Seleccioná el estado del Trámite</option>
                <option value="opcion1">Opción 1</option>
                <option value="opcion2">Opción 2</option>
                <option value="opcion3">Opción 3</option>
                <!-- Agrega más opciones según sea necesario -->
            </select>
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>




    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane" aria-hidden="true"></i>
</i>
 {{ __('Enviar') }}</button>
    </div>
</div>