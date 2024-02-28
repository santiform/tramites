@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Venta
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Editando Venta / Presupuesto de AySA') }}</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('ventas.update', $venta->id) }}"  role="form" enctype="multipart/form-data">
                            
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

                                <div class="row" >
                                    <div class="col-6" >
                                        <div class="form-group">
                                        <label for="costo"><i class="bi bi-bank"></i> Costo ($)</label>
                                        {{ Form::text('costo', $venta->costo, ['class' => 'form-control' . ($errors->has('costo') ? ' is-invalid' : ''), 'placeholder' => 'Costo', 'required' => false]) }}
                                        {!! $errors->first('costo', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>
                                    </div>

                                    <div class="col-6" >
                                        <div class="form-group">
                                            <label for="precio_venta"><i class="bi bi-cash-coin"></i> Precio de Venta ($)</label>
                                            {{ Form::text('precio_venta', $venta->precio_venta, ['class' => 'form-control' . ($errors->has('precio_venta') ? ' is-invalid' : ''), 'placeholder' => 'Precio Venta']) }}
                                            {!! $errors->first('precio_venta', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>
                                    </div>
                                </div>


                                <div style="height: 1.3rem;" ></div>
                                

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


                                <div style="height: 1.3rem;" ></div>
  

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="dato2">Dato 2</label>
                                            <input type="text" id="dato2" name="dato2" placeholder="Dato2" class="form-control" value="{{ $venta['dato2'] }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="dato3">Dato 3</label>
                                            <input type="text" id="dato3" name="dato3" placeholder="Dato3" class="form-control" value="{{ $venta['dato3'] }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="dato4">Dato 4</label>
                                    <input type="text" id="dato4" name="dato4" placeholder="Dato4" class="form-control" value="{{ $venta['dato4'] }}">
                                </div>


                                <div style="height: 1.3rem;" ></div>


                                <div class="form-group">
                                    <label for="dato1">Observaciones</label> <br>
                                    <textarea name="observaciones" rows="8" cols="68">{{ $venta->observaciones }}</textarea>
                                </div>

                            </div>
                        </div>


                            <div class="box-footer mt20">
                                    <button type="submit" class="btn btn-primary"><i class="bi bi-pencil-fill"></i>
                             {{ __('Modificar') }}</button>
                                </div>
                            </div>




                            <!-- con este script de abajo hacemos que no se peudan recibir minúsculas ni letras con tilde, utilizando jquery -->
                            <script>
                            $(document).ready(function() {
                              // Escucha el evento de cambio en los campos de entrada
                              $('input[type="text"]').on('input', function() {
                                // Verifica si el campo actual es el campo de excepción
                                if ($(this).attr('id') !== 'convertirAMinusculas') {
                                  var inputValue = $(this).val();
                                  var modifiedValue = inputValue.toUpperCase().replace(/[ÁÉÍÓÚáéíóúÜüÄËÏÖÜäëïöü`´]/g, function(letter) {
                                    // Mapea las vocales con caracteres especiales a su versión sin tilde o dieresis
                                    var vowelsWithAccent = 'ÁÉÍÓÚáéíóúÜüÄËÏÖÜäëïöü';
                                    var vowelsWithoutAccent = 'AEIOUaeiouUuAEIOUaeiouUu';
                                    var index = vowelsWithAccent.indexOf(letter);
                                    return vowelsWithoutAccent.charAt(index);
                                  });
                                  $(this).val(modifiedValue);
                                }
                              });
                            });
                            </script>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
