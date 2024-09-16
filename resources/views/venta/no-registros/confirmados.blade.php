@extends('layouts.app')

@section('template_title')
    Venta
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header card-confirmados">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                <i class="bi bi-check-circle-fill"></i> CONFIRMADOS
                            </span>

                             <div class="float-right">
                                <a href="{{ route('ventas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  <i class="fa fa-plus-circle" aria-hidden="true"></i> {{ __('Nueva venta') }}
                                </a>
                              </div>
                        </div>
                    </div>


                    <div class="card-body">
                        <div class="row" style="padding-inline: 13rem;">

                            <div class="col-3" ></div>

                            <div class="box-tramite col-6" style="font-size: 21px; padding: 1.2rem; text-align: center;" >
                                <img src="../resources/img/tick.png" width="120px" style="margin-bottom: 0rem;">
                                <p>No hay más <b>confirmados</b> pendientes, ¡podés relajarte un rato y auto-recompensarte! <img src="../resources/img/guino.png" width="38px"></p>
                                <div style="height: 1.2rem;" ></div>
                                <img src="../resources/img/festejo.png" width="180px">
                                <div style="height: 1.3rem;" ></div>
                            </div>

                            <div class="col-3" ></div>   

                        </div>    
                    </div>


                </div>
           </div>
        </div>
    </div>

  @if (session('crear')  == 'ok')

     <script type="text/javascript">
         
                 Swal.fire({
          
          icon: 'success',
          iconColor: '#ffdd00',
          color: '#F4F4F4',
          background: '#191919',
          title: 'Venta creada correctamente',
          showConfirmButton: false,
          timer: 2500
        })

     </script>

     @endif

@endsection