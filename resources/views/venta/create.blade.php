@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Venta
@endsection

@section('content')
    <div class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Nueva Venta / Presupuesto') }}</span>
                    </div>
                    <div class="card-body">
                        <form class="alerta-continuar" method="POST" action="{{ route('ventas.create2') }}" role="form" enctype="multipart/form-data">
                            @csrf

                            <div class="box box-info padding-1">
                                <div class="box-body">
                                    
                                    <div class="form-group">
                                        <label for="id_tramite"><i class="bi bi-keyboard"></i> Tipo de Trámite</label>
                                        <select name="id_tramite" id="id_tramite" class="form-control{{ $errors->has('tipo_tramite') ? ' is-invalid' : '' }}">
                                            <option value="" selected disabled>Seleccioná un tipo de trámite</option>
                                            @foreach ($tramites as $tramite)
                                                <option value="{{ $tramite->id }}">{{ $tramite->nombre }}</option>
                                            @endforeach
                                        </select>
                                        {!! $errors->first('tipo_tramite', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>


                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="cliente"><i class="bi bi-person"></i> Nombre y Apellido</label>
                                                {{ Form::text('cliente', $venta->cliente, ['class' => 'form-control' . ($errors->has('cliente') ? ' is-invalid' : ''), 'placeholder' => 'Cliente']) }}
                                                {!! $errors->first('cliente', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="celular"><i class="bi bi-person"></i> Celular Cliente</label>
                                                {{ Form::text('celular', $venta->celular, ['class' => 'form-control' . ($errors->has('celular') ? ' is-invalid' : ''), 'placeholder' => 'Celular']) }}
                                                {!! $errors->first('celular', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="id_vendedor"><i class="bi bi-keyboard"></i> Vendedor</label>
                                                <select name="id_vendedor" id="id_vendedor" class="form-control{{ $errors->has('vendedor') ? ' is-invalid' : '' }}">
                                                    <option value="" selected disabled>Seleccioná un vendedor</option>
                                                    @foreach ($vendedores as $vendedor)
                                                        <option value="{{ $vendedor->id }}">{{ $vendedor->nombre_vendedor }}</option>
                                                    @endforeach
                                                </select>
                                                {!! $errors->first('vendedor', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="costo"><i class="bi bi-bank"></i> Costo ($)</label>
                                                {{ Form::text('costo', $venta->costo, ['class' => 'form-control' . ($errors->has('costo') ? ' is-invalid' : ''), 'placeholder' => 'Costo']) }}
                                                {!! $errors->first('costo', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="precio_venta"><i class="bi bi-cash-coin"></i> Precio de Venta ($)</label>
                                                {{ Form::text('precio_venta', $venta->precio_venta, ['class' => 'form-control' . ($errors->has('precio_venta') ? ' is-invalid' : ''), 'placeholder' => 'Precio Venta']) }}
                                                {!! $errors->first('precio_venta', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="forma_pago"><i class="bi bi-credit-card-2-back"></i> Forma de pago</label>
                                                <select name="forma_pago" id="forma_pago" class="form-control{{ $errors->has('forma_pago') ? ' is-invalid' : '' }}">
                                                    <option value="" selected disabled>Seleccioná una opción</option>
                                                    <option value="A confirmar">A confirmar</option>
                                                    <option value="Efectivo">Efectivo</option>
                                                    <option value="Santi Banco Provincia">Santi Banco Provincia</option>
                                                </select>
                                                {!! $errors->first('forma_pago', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="estado_pago"><i class="bi bi-clock-history"></i> Estado pago</label>
                                                <select name="estado_pago" id="estado_pago" class="form-control{{ $errors->has('estado_pago') ? ' is-invalid' : '' }}">
                                                    <option value="" selected disabled>Seleccioná una opción</option>
                                                    <option value="A confirmar">A confirmar</option>
                                                    <option value="Pendiente">Pendiente</option>
                                                    <option value="Abonado">Abonado</option>
                                                </select>
                                                {!! $errors->first('estado_pago', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="tardanza"><i class="bi bi-alarm"></i> Tardanza</label>
                                                <select name="tardanza" id="tardanza" class="form-control{{ $errors->has('tardanza') ? ' is-invalid' : '' }}">
                                                    <option value="" selected disabled>Seleccioná una opción</option>
                                                    <option value="24 hs">24 hs</option>
                                                    <option value="48 hs">48 hs</option>
                                                    <option value="4 días">4 días</option>
                                                    <option value="1 semana">1 semana</option>
                                                    <option value="1 mes">1 mes</option>
                                                </select>
                                                {!! $errors->first('tardanza', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="id_estado"><i class="bi bi-hourglass-split"></i> Estado trámite</label>
                                                <select name="id_estado" id="id_estado" class="form-control{{ $errors->has('id_estado') ? ' is-invalid' : '' }}">
                                                    <option value="" selected disabled>Seleccioná una opción</option>
                                                    <option value="1">Solicitud</option>
                                                    <option value="2">Presupuesto</option>
                                                    <option value="3">Enviado al cliente</option>
                                                    <option value="4">Confirmado</option>
                                                    <option value="5">Finalizado</option>
                                                </select>
                                                {!! $errors->first('id_estado', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div> <!-- Fin de box-body -->

                                <div class="box-footer mt20">
                                    <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
                                </div>
                            </div> <!-- Fin de box box-info padding-1 -->

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



<script type="text/javascript">

        $('.alerta-continuar').submit(function(e){
            e.preventDefault();

            Swal.fire({
              title: '¿Continuar?',
              color: '#F4F4F4',
              icon: 'warning',

              iconColor: '#ffdd00',
              showCancelButton: true,
              confirmButtonColor: '#858585',
              cancelButtonColor: '#373737',
              cancelButtonText: 'No, cancelar',
              confirmButtonText: 'Sí, continuar',
              background: '#191919',
            }).then((result) => {
              if (result.isConfirmed) {

                this.submit();

              }
            })
            
        });

</script>



@if (session('noFormaPago')  == 'ok')

     <script type="text/javascript">
         
        Swal.fire({
          title: "Error",
          text: "Si el trámite se encuentra Confirmado o Finalizado, tenés que establecer una forma de pago válida",
          icon: "error",
          background: '#191919', // Color de fondo
          iconColor: '#ffdd00', // Color del ícono
          color: '#f4f4f4',
          confirmButtonColor: '#373737', // Color del botón de aceptar
          confirmButtonText: 'Aceptar', // Texto del botón de aceptar

        });

     </script>

     @endif

     @if (session('noPago')  == 'ok')

     <script type="text/javascript">
         
        Swal.fire({
          title: "Error",
          text: "Para confirmar un Presupuesto, el trámite debe estar abonado (cambiar Estado pago)",
          icon: "error",
          background: '#191919', // Color de fondo
          iconColor: '#ffdd00', // Color del ícono
          color: '#f4f4f4',
          confirmButtonColor: '#373737', // Color del botón de aceptar
          confirmButtonText: 'Aceptar', // Texto del botón de aceptar

        });

     </script>

     @endif  


@endsection
