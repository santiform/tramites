@extends('layouts.app')

@section('content')

    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Nueva Venta / Presupuesto de ARBA</span>
                    </div>

@include('layouts.ventas.edit.general')

                        <div style="height: 2.7rem;" ></div> <hr> <div style="height: 4.4rem;" ></div>

                        <div class="box box-info padding-1">
                            <div class="box-body">

                                <div class="row">

                                    <div class="form-group col-md-6">
                                                <label for="dato1">Número de cuil</label>
                                                <input type="text" id="dato1" name="dato1" placeholder="" class="form-control" value="{{ $venta['dato1'] }}">
                                            </div>

                                    <div class="form-group col-md-6">
                                                <label for="dato2">Clave ARBA</label>
                                                <input type="text" id="dato2" name="dato2" placeholder="" class="form-control" value="{{ $venta['dato2'] }}">
                                            </div>
                                </div>  

                                                
                                </div>
                                   
                                </div>

                                <div style="height: 1.3rem;" ></div>

                                <div class="form-group">
                                    <label for="dato1">Observaciones</label> <br>
                                    <textarea name="observaciones" rows="8" cols="68">{{ $venta->observaciones }}</textarea>
                                </div>



                            <div class="box-footer mt20">
                                    <button type="submit" class="btn btn-primary"><i class="bi bi-pencil-fill"></i>
                             {{ __('Modificar') }}</button>
                            </div>


                            </div>
                        </div>



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