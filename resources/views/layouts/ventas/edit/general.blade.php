                    <div class="card-body">
                        <form class="alerta-editar" method="POST" action="{{ route('ventas.update', $venta->id) }}"  role="form" enctype="multipart/form-data">
                            
                            {{ method_field('PATCH') }}
                            @csrf

                        <div class="box box-info padding-1">
                            <div class="box-body">
                                
                                <div class="form-group">
                                    <label for="id_tramite"><i class="bi bi-keyboard"></i> Tipo de Trámite</label>
                                        <select name="id_tramite" id="id_tramite" class="form-control{{ $errors->has('tipo_tramite') ? ' is-invalid' : '' }}">
                                            <option value="" selected disabled>Seleccioná un tipo de trámite</option>
                                            @foreach ($tramites as $tramite)
                                                <option value="{{ $tramite->id }}" {{ $venta['id_tramite'] == $tramite->id ? 'selected' : '' }}>{{ $tramite->nombre }}</option>
                                            @endforeach
                                        </select>
                                    {!! $errors->first('tipo_tramite', '<div class="invalid-feedback">:message</div>') !!}
                                </div>


                                <div style="height: 1.3rem;" ></div>


                                <div class="row" >
                                    <div class="col-6" >
                                        <div class="form-group">
                                            <label for="cliente"><i class="bi bi-person"></i> Nombre y Apellido</label>
                                            {{ Form::text('cliente', $venta->cliente, ['class' => 'form-control' . ($errors->has('cliente') ? ' is-invalid' : ''), 'placeholder' => 'Cliente']) }}
                                            {!! $errors->first('cliente', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>
                                    </div>

                                    <div class="col-6" >

                                        <div class="form-group">
                                            <label for="celular"><i class="bi bi-person"></i> Celular Cliente</label>
                                            {{ Form::text('celular', $venta->celular, ['class' => 'form-control' . ($errors->has('celular') ? ' is-invalid' : ''), 'placeholder' => 'Celular']) }}
                                            {!! $errors->first('celular', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>
                                    </div>
                                </div>    

                                <div style="height: 1.3rem;" ></div>    

                                <div class="row" >
                                    <div class="col-4" >
                                        <div class="form-group">
                                        <label for="costo"><i class="bi bi-bank"></i> Costo ($)</label>
                                        {{ Form::text('costo', $venta->costo, ['class' => 'form-control' . ($errors->has('costo') ? ' is-invalid' : ''), 'placeholder' => 'Costo', 'required' => false]) }}
                                        {!! $errors->first('costo', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>
                                    </div>

                                    <div class="col-4" >
                                        <div class="form-group">
                                            <label for="precio_venta"><i class="bi bi-cash-coin"></i> Precio de Venta ($)</label>
                                            {{ Form::text('precio_venta', $venta->precio_venta, ['class' => 'form-control' . ($errors->has('precio_venta') ? ' is-invalid' : ''), 'placeholder' => 'Precio Venta']) }}
                                            {!! $errors->first('precio_venta', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>
                                    </div>

                                    <div class="col-4">    
                                        <label for="forma_pago"><i class="bi bi-credit-card-2-back"></i> Forma de pago</label>
                                        <select name="forma_pago" id="forma_pago" class="form-control{{ $errors->has('tardanza') ? ' is-invalid' : '' }}">
                                            <option value="" {{ is_null($venta->forma_pago) ? 'selected' : '' }} disabled>Seleccioná una opción</option>
                                            <option value="A confirmar" {{ old('forma_pago') == 'A confirmar' || $venta->forma_pago == 'A confirmar' ? 'selected' : '' }}>A confirmar</option>
                                            <option value="Efectivo" {{ old('forma_pago') == 'Efectivo' || $venta->forma_pago == 'Efectivo' ? 'selected' : '' }}>Efectivo</option>
                                            <option value="Santi Banco Provincia" {{ old('forma_pago') == 'Santi Banco Provincia' || $venta->forma_pago == 'Santi Banco Provincia' ? 'selected' : '' }}>Santi Banco Provincia</option>
                                        </select>
                                        {!! $errors->first('forma_pago', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>                             

                                </div>

                                <div style="height: 1.3rem;" ></div>
                                
                                <div class="row">

                                    <div class="col-4">    
                                        <label for="estado_pago"><i class="bi bi-clock-history"></i> Estado pago</label>
                                        <select name="estado_pago" id="estado_pago" class="form-control{{ $errors->has('tardanza') ? ' is-invalid' : '' }}">
                                            <option value="" {{ is_null($venta->tardanza) ? 'selected' : '' }} disabled>Seleccioná una opción</option>
                                            <option value="A confirmar" {{ old('estado_pago') == 'A confirmar' || $venta->estado_pago == 'A confirmar' ? 'selected' : '' }}>A confirmar</option>
                                            <option value="Pendiente" {{ old('estado_pago') == 'Pendiente' || $venta->estado_pago == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                                            <option value="Abonado" {{ old('estado_pago') == 'Abonado' || $venta->estado_pago == 'Abonado' ? 'selected' : '' }}>Abonado</option>
                                        </select>
                                        {!! $errors->first('forma_pago', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    
                                    <div class="col-4">    
                                        <label for="tardanza"><i class="bi bi-alarm"></i> Tardanza</label>
                                        <select name="tardanza" id="tardanza" class="form-control{{ $errors->has('tardanza') ? ' is-invalid' : '' }}">
                                            <option value="" {{ is_null($venta->tardanza) ? 'selected' : '' }} disabled>Seleccioná una opción</option>
                                            <option value="48 hs" {{ old('tardanza') == '48 hs' || $venta->tardanza == '48 hs' ? 'selected' : '' }}>48 hs</option>
                                            <option value="4 días" {{ old('tardanza') == '4 días' || $venta->tardanza == '4 días' ? 'selected' : '' }}>4 días</option>
                                            <option value="5 días" {{ old('tardanza') == '5 días' || $venta->tardanza == '5 días' ? 'selected' : '' }}>5 días</option>
                                            <option value="6 días" {{ old('tardanza') == '6 días' || $venta->tardanza == '6 días' ? 'selected' : '' }}>6 días</option>
                                            <option value="1 semana" {{ old('tardanza') == '1 semana' || $venta->tardanza == '1 semana' ? 'selected' : '' }}>1 semana</option>
                                            <option value="2 semanas" {{ old('tardanza') == '2 semanas' || $venta->tardanza == '2 semanas' ? 'selected' : '' }}>2 semanas</option>
                                            <option value="3 semanas" {{ old('tardanza') == '3 semanas' || $venta->tardanza == '3 semanas' ? 'selected' : '' }}>3 semanas</option>
                                            <option value="1 mes" {{ old('tardanza') == '1 mes' || $venta->tardanza == '1 mes' ? 'selected' : '' }}>1 mes</option>
                                        </select>
                                        {!! $errors->first('tardanza', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>

                                    <div class="col-md-4">
                                     <div class="form-group">
                                            <label for="id_estado"><i class="bi bi-hourglass-split"></i> Estado del trámite</label>
                                            <select name="id_estado" id="id_estado" class="form-control{{ $errors->has('estado') ? ' is-invalid' : '' }}">
                                                <option value="" selected disabled>Seleccioná el estado del Trámite</option>
                                                @foreach ($estados as $estado)
                                                    <option value="{{ $estado->id }}" {{ $venta['id_estado'] == $estado->id ? 'selected' : '' }}>{{ $estado->nombre }}</option>
                                                @endforeach
                                            </select>
                                            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>
                                    </div>

                                    <input type="hidden" name="previousUrl" value="{{ $previousUrl }}">
     

                            </div>
                        </div>