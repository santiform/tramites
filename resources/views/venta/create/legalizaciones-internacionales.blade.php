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
                        <span class="card-title">Nueva Venta / Presupuesto de Legalizaciones internacionales</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('ventas.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                        <input type="hidden" name="id_tramite" value="{{ $data->id_tramite }}">
                        <input type="hidden" name="cliente" value="{{ $data->cliente }}">
                        <input type="hidden" name="celular" value="{{ $data->celular }}">
                        <input type="hidden" name="costo" value="{{ $data->costo }}">
                        <input type="hidden" name="precio_venta" value="{{ $data->precio_venta }}">
                        <input type="hidden" name="id_estado" value="{{ $data->id_estado }}">


                        <div class="box box-info padding-1">
                            <div class="box-body">

                                <div class="row" >

                                    <div class="col-12" >                                        
                                        <div class="form-group">                                            
                                            <p class="form-group img_server" >(Más abajo tenés el DIVOX Image Server, copiá y pegá la URL cuando sea necesario)</p>
                                        </div>
                                    </div>

                                    <div class="col-12" >                                        
                                        <div class="form-group">                                            
                                            <label for="dato1">Foto del documento a legalizar: (Pegar URL)</label>
                                            <input type="text" id="dato1" name="dato1" placeholder="" class="form-control">
                                        </div>
                                    </div>

                                    <div class="box-tramite__espaciador" ></div>
                                    <div class="box-tramite__espaciador" ></div>

                                    <iframe src="https://servidor.net.ar/imgServer/" height="570" frameborder="0"></iframe>

                                    <div class="box-tramite__espaciador" ></div>

                                    <div class="form-group">
                                        <label for="dato1">Observaciones</label> <br>
                                        <textarea class="input" name="observaciones" rows="6" cols="68"></textarea>
                                    </div>

                                </div>

                                



                            </div>
                        </div>


                                <div class="box-footer mt20">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane" aria-hidden="true"></i>
                            </i>
                             {{ __('Enviar') }}</button>
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
