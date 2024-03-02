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
                                Mostrando Venta / Presupuesto de {{ $tipoTramiteLetras }}
                            </span>

                            <a class="btn btn-sm btn-primary" href="{{ route('ventas.edit',$venta->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                             
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
                                        <span class="box-tramite__icono" ><i class="bi bi-calendar-event"></i></span>
                                        <span>Fecha de ingreso: <b>{{ \Carbon\Carbon::parse($venta->created_at)->format('d/m/Y') }}</b></span>
                                    </div>

                                    <div class="box-tramite__espaciador"></div>

                                    <div class="box-tramite__linea">
                                        <span class="box-tramite__icono" ><i class="bi bi-alarm"></i></span>
                                        <span>Tardanza: <b>{{$venta->tardanza}}</b></span>
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
                                        <span class="box-tramite__icono" ><i class="bi bi-piggy-bank"></i></span>
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
                                            <a class="btn btn-sm btn-enviado" href="{{ route('estado.enviado',$venta->id) }}"><i class="bi bi-arrow-right-circle-fill"></i> Cambiar a Enviado</a>

                                            <div class="box-tramite__espaciador"></div>

                                            <a class="btn btn-sm btn-solicitud" href="{{ route('estado.solicitud',$venta->id) }}"><i class="bi bi-arrow-left-circle-fill"></i> Cambiar a Solicitud</a>
                                        </center>

                                    @endif

                                    @if ($estadoLetras == "Enviado al cliente")

                                        <div class="estadoEnviado" >
                                            <div class="box-estado__icono"><i class="bi bi-send-exclamation"></i></div>
                                            <div class="box-estado__valor">Enviado al cliente</div>
                                        </div>

                                        <div class="box-tramite__espaciador"></div>

                                        <center>
                                            <a class="btn btn-sm btn-confirmado" href="{{ route('estado.confirmado',$venta->id) }}"><i class="bi bi-arrow-right-circle-fill"></i> Cambiar a Confirmado</a>

                                            <div class="box-tramite__espaciador"></div>

                                            <a class="btn btn-sm btn-presupuesto" href="{{ route('estado.presupuesto',$venta->id) }}"><i class="bi bi-arrow-left-circle-fill"></i> Cambiar a Presupuesto</a>
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

                                            <a class="btn btn-sm btn-enviado" href="{{ route('estado.enviado',$venta->id) }}"><i class="bi bi-arrow-left-circle-fill"></i> Cambiar a Enviado</a>
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


    <div style="height: 2rem;" ></div>


     <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">

                    <div class="card-body">

                        <div class="row" >
                        
                        <div class="col-6" >
                            <center><img src="https://localhost/tramites/resources/img/aysa.png"></center>
                        </div>

                        <div class="col-6" >
                            <div class="box-tramite" >Tramite</div>
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

            
    @if (session('editar')  == 'ok')

     <script type="text/javascript">
         
                 Swal.fire({
          
          icon: 'success',
          iconColor: '#ffdd00',
          color: '#F4F4F4',
          background: '#191919',
          title: 'Venta editada correctamente',
          showConfirmButton: false,
          timer: 2500
        })

     </script>

     @endif


@endsection
