@extends('layouts.app')

@section('content')

    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Editando Venta / Presupuesto de Infracciones') }}</span>
                    </div>

@include('layouts.ventas.edit.general')

                        <div style="height: 2.7rem;" ></div> <hr> <div style="height: 4.4rem;" ></div>

                        <div class="box box-info padding-1">
                            <div class="box-body">

                                <div class="form-group">
                                            <label for="dato1">Patente</label>
                                            <input type="text" id="dato1" name="dato1" placeholder="Dato1" class="form-control" value="{{ $venta['dato1'] }}">
                                        </div>
                                    </div>
                                   
                                </div>

                                <div style="height: 1.3rem;" ></div>

                                <div class="col-12" >
                                        <center>
                                            <iframe src="https://servidor.net.ar/imgserver/" width="530px" height="570" frameborder="0"></iframe>
                                        </center>

                                        <div class="img_server">Generar URL arriba y pegar en DNI Frente y Dorso para modificar</div>                                        
                                    </div>

                                <div style="height: 2.3rem;" ></div>

                                <div class="form-group">
                                    <label for="dato2">DNI Frente</label> <br>
                                    <textarea name="dato2" rows="1" cols="75">{{ old('dato2', $venta->dato2) }}</textarea>
                                </div>

                                <div style="height: 1.3rem;" ></div>


                                <div class="form-group">
                                    <label for="dato3">DNI Dorso</label> <br>
                                    <textarea name="dato3" rows="1" cols="75">{{ old('dato3', $venta->dato3) }}</textarea>
                                </div>

                                <div style="height: 1.3rem;" ></div>


                                <div class="form-group">
                                    <label for="observaciones">Observaciones</label> <br>
                                    <textarea name="observaciones" rows="8" cols="75">{{ $venta->dato4 }}</textarea>
                                </div>



                            <div class="box-footer mt20">
                                    <button type="submit" class="btn btn-primary"><i class="bi bi-pencil-fill"></i>
                             {{ __('Modificar') }}</button>
                            </div>


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


<script type="text/javascript">

        $('.alerta-editar').submit(function(e){
            e.preventDefault();

            Swal.fire({
              title: '¿Editar Venta?',
              color: '#F4F4F4',
              icon: 'warning',

              iconColor: '#ffdd00',
              showCancelButton: true,
              confirmButtonColor: '#858585',
              cancelButtonColor: '#373737',
              cancelButtonText: 'No, cancelar',
              confirmButtonText: 'Sí, editar',
              background: '#191919',
            }).then((result) => {
              if (result.isConfirmed) {

                this.submit();

              }
            })
            
        });

</script>

@endsection