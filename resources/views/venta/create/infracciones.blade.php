@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Venta
@endsection

@section('content')


<style type="text/css">
    .imagen-contenedor {
    display: flex;
    justify-content: center; /* Centrar horizontalmente */
    align-items: center; /* Centrar verticalmente (opcional) */
}
</style>


    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Nueva Venta / Presupuesto de Infracciones</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('ventas.store') }}" role="form" enctype="multipart/form-data">
                            @csrf

                        <input type="hidden" name="id_tramite" value="{{ $data->id_tramite }}">
                        <input type="hidden" name="cliente" value="{{ $data->cliente }}">
                        <input type="hidden" name="celular" value="{{ $data->celular }}">
                        <input type="hidden" name="costo" value="{{ $data->costo }}">
                        <input type="hidden" name="estado_pago" value="{{ $data->estado_pago }}">
                        <input type="hidden" name="precio_venta" value="{{ $data->precio_venta }}">
                        <input type="hidden" name="id_estado" value="{{ $data->id_estado }}">


                        <div class="box box-info padding-1">
                            <div class="box-body">

                                <div class="row" >
                                    <div class="col-6" >
                                        <div class="form-group">
                                            <label for="dato1">Patente</label>
                                            <input type="text" id="dato1" name="dato1" placeholder="" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-6">
                                            <label for="dato4">Zona</label>
                                                <select name=" dato4" id=" dato4" class="form-control{{ $errors->has('dato2') ? ' is-invalid' : '' }}">
                                                    <option value="" selected disabled>Seleccioná una opción</option>
                                                    <option value="CABA"></i>CABA</option>
                                                    <option value="Buenos Aires"></i>Buenos Aires</option>
                                                    <!-- Agrega más opciones según sea necesario -->
                                                </select>
                                                {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
                                        </div> 

                                    <div class="separador" ></div>

                                    <div class="col-12" >
                                        <center>
                                            <iframe src="https://servidor.net.ar/imgserver/" width="530px" height="570" frameborder="0"></iframe>
                                        </center>

                                        <div class="img_server">Generar URL arriba y pegar en DNI Frente y Dorso</div>                                        
                                    </div>

                                    <div class="separador" ></div>

                                    <div class="col-6">
                                        <label for="dato2">DNI Frente(pegar link)</label>
                                        <input type="text" id="dato2" name="dato2" placeholder="" class="form-control">
                                    </div>

                                    <!-- Carga de Imagen DNI lado B -->
                                    <div class="col-6">
                                        <label for="dato3">DNI Dorso(pegar link))</label>
                                        <input type="text" id="dato3" name="dato3" placeholder="" class="form-control">
                                    </div>

                                    
                                </div>

                                <div class="form-group" style="margin-top: 2rem;">
                                    <label for="observaciones">Observaciones</label> <br>
                                    <textarea class="input" name="observaciones" rows="6" cols="68"></textarea>
                                </div>
                            </div>
                        </div>


                                <div class="box-footer mt20">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane" aria-hidden="true"></i>
                            </i>
                             {{ __('Enviar') }}</button>
                                </div>
                            </div>




                            <script>
                            $(document).ready(function() {
                              // Escucha el evento de cambio en los campos de entrada
                              $('input[type="text"]').on('input', function() {
                                // Excluir los campos 'dato2' y 'dato3' de la conversión
                                if ($(this).attr('id') !== 'dato2' && $(this).attr('id') !== 'dato3') {
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
