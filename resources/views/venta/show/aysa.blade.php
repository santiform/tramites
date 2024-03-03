@extends('layouts.app')

@section('content')
        
@include('layouts.ventas.show.aysa')
     <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">

                    <div class="card-body">

                        <div class="row" >
                        
                        <div class="col-6" >
                            <center><img src="https://localhost/tramites/resources/img/aysa.png"></center>
                        </div>

                        <div class="col-6 " >
                             <div class="box-tramite" >
                                 <div class="box-tramite__linea">
                                        <span class="box-tramite__icono" ><i class="bi bi-person-lines-fill"></i></span>
                                        <span>Número de cliente: <b>{{$venta->dato1}}</b></span>
                                 </div>

                                 <div class="box-tramite__espaciador" ></div>
                                 <div class="box-tramite__espaciador" ></div>

                                 <div class="box-tramite__linea">
                                        <span class="box-tramite__icono" ><i class="bi bi-search"></i></span>
                                        <span>Observaciones: <b>{{$venta->observaciones}}</b></span>
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
