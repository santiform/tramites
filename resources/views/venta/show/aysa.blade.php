@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Venta
@endsection

@section('content')
        <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Mostrando Venta / Presupuesto de AySA') }}
                            </span>

                             
                        </div>
                    </div>


                    <div class="card-body">
                        <div class="row cuadrados" >

                            

                            <div class="col-4" >
                                <div class="box-client" >
                                    <div class="box-client__icono"><i class="bi bi-person-vcard"></i></div>
                                    <div class="box-client__clienteNombre">{{ $venta->cliente }}</div>
                                    <div class="box-client__celular"><i class="bi bi-whatsapp"></i> {{ $venta->celular }}</div>
                                </div>
                            </div>    

                            <div class="col-5" > 
                                <div class="box-tramite" >

                                    <div class="box-tramite__linea">
                                        <span class="box-tramite__icono" ><i class="bi bi-list-columns-reverse"></i></span>
                                        <span>Tipo de Trámite: <b>{{$tipoTramiteLetras}}</b></span>
                                    </div>

                                    <div class="box-tramite__espaciador"></div>

                                    <div class="box-tramite__linea">
                                        <span class="box-tramite__icono" ><i class="bi bi-qr-code-scan"></i></span>
                                        <span>Trámite ID: <b>{{$venta->id}}</b></span>
                                    </div>

                                    <div class="box-tramite__espaciador"></div>

                                    <div class="box-tramite__linea">
                                        <span class="box-tramite__icono" ><i class="bi bi-bank"></i></span>
                                        <span>Costo: <b>${{$venta->costo}}</b></span>
                                    </div>

                                    <div class="box-tramite__espaciador"></div>

                                    <div class="box-tramite__linea">
                                        <span class="box-tramite__icono" ><i class="bi bi-cash-coin"></i></span>
                                        <span>Precio de Venta: <b>${{$venta->precio_venta}}</b></span>
                                    </div>

                                    <div class="box-tramite__espaciador"></div>

                                    <div class="box-tramite__linea">
                                        <span class="box-tramite__icono" ><i class="bi bi-stoplights"></i></span>
                                        <span>Ganacia: <b>${{$ganancia}}</b></span>
                                    </div>
                                </div>      

                            </div>

                            <div class="col-3" >
                                <div class="box-estado" >

                                    @if ($estadoLetras == "Solicitud")

                                        <div class="estadoSolicitud" >
                                            <div class="box-estado__icono"><i class="bi bi-list-check"></i></div>
                                            <div class="box-estado__valor">Solicitud</div>
                                        </div>

                                        <div class="box-tramite__espaciador"></div>
                                        <div class="box-tramite__espaciador"></div>

                                        <center><a class="btn btn-sm btn-presupuesto" href="{{ route('estado.presupuesto',$venta->id) }}"><i class="bi bi-arrow-right-circle-fill"></i> Cambiar a Presupuesto</a></center>

                                    @endif

                                    @if ($estadoLetras == "Presupuesto")

                                        <div class="estadoPresupuesto" >
                                            <div class="box-estado__icono"><i class="bi bi-calculator"></i></div>
                                            <div class="box-estado__valor">Presupuesto</div>
                                        </div>

                                        <div class="box-tramite__espaciador"></div>

                                        <center>
                                            <a class="btn btn-sm btn-confirmado" href="{{ route('estado.confirmado',$venta->id) }}"><i class="bi bi-arrow-right-circle-fill"></i> Cambiar a Confirmado</a>

                                            <div class="box-tramite__espaciador"></div>

                                            <a class="btn btn-sm btn-solicitud" href="{{ route('estado.solicitud',$venta->id) }}"><i class="bi bi-arrow-left-circle-fill"></i> Cambiar a Solicitud</a>
                                        </center>

                                    @endif

                                    @if ($estadoLetras == "Confirmado")

                                        <div class="estadoConfirmado" >
                                            <div class="box-estado__icono"><i class="bi bi-check-circle-fill"></i></i></div>
                                            <div class="box-estado__valor">Confirmado</div>
                                        </div>
                                        
                                        <div class="box-tramite__espaciador"></div>

                                        <center>
                                            <a class="btn btn-sm btn-finalizado" href="{{ route('estado.finalizado',$venta->id) }}"><i class="bi bi-arrow-right-circle-fill"></i> Cambiar a Finalizado</a>

                                            <div class="box-tramite__espaciador"></div>

                                            <a class="btn btn-sm btn-presupuesto" href="{{ route('estado.presupuesto',$venta->id) }}"><i class="bi bi-arrow-left-circle-fill"></i> Cambiar a Presupuesto</a>
                                        </center>

                                    @endif

                                    @if ($estadoLetras == "Finalizado")

                                        <div class="estadoFinalizado" >
                                            <div class="box-estado__icono"><i class="bi bi-flag"></i></div>
                                            <div class="box-estado__valor">Finalizado</div>
                                        </div>    

                                        <div class="box-tramite__espaciador"></div>
                                        <div class="box-tramite__espaciador"></div>

                                        <center>
                                            <a class="btn btn-sm btn-confirmado" href="{{ route('estado.confirmado',$venta->id) }}"><i class="bi bi-arrow-left-circle-fill"></i> Cambiar a Confirmado</a>
                                        </center>

                                    @endif
                                    
                                </div>
                            </div>  

                        </div>       
                    </div>
                </div>
           </div>
        </div>
    </div>



<script type="text/javascript">

        $('.alerta-estado').submit(function(e){
            e.preventDefault();

            Swal.fire({
              title: '¿Cambiar Estado?',
              color: '#F4F4F4',
              icon: 'warning',

              iconColor: '#ffdd00',
              showCancelButton: true,
              confirmButtonColor: '#858585',
              cancelButtonColor: '#373737',
              cancelButtonText: 'No, cancelar',
              confirmButtonText: 'Sí, cambiar',
              background: '#191919',
            }).then((result) => {
              if (result.isConfirmed) {

                this.submit();

              }
            })
            
        });

</script>


@endsection
