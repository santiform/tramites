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
                        <span class="card-title">Nueva Venta / Presupuesto de ARBA</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('ventas.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                        <input type="hidden" name="id_tramite" value="{{ $data->id_tramite }}">
                        <input type="hidden" name="cliente" value="{{ $data->cliente }}">
                        <input type="hidden" name="celular" value="{{ $data->celular }}">
                        <input type="hidden" name="id_vendedor" value="{{ $data->id_vendedor }}">
                        <input type="hidden" name="costo" value="{{ $data->costo }}">
                        <input type="hidden" name="precio_venta" value="{{ $data->precio_venta }}">
                        <input type="hidden" name="forma_pago" value="{{ $data->forma_pago }}">
                        <input type="hidden" name="estado_pago" value="{{ $data->estado_pago }}">
                        <input type="hidden" name="tardanza" value="{{ $data->tardanza }}">                        
                        <input type="hidden" name="id_estado" value="{{ $data->id_estado }}">

                        <input type="hidden" name="urlOrigen" value="{{ $data->urlOrigen }}">


                        <div class="box box-info padding-1">
                            <div class="box-body">

                                <div class="row" >
                                    <div class="col-6" >
                                        <div class="form-group">
                                            <label for="dato1">Número de Cuil</label>
                                            <input type="text" id="dato1" name="dato1" placeholder="" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-6" >
                                        <div class="form-group">
                                            <label for="dato2">Clave ARBA</label>
                                            <input type="text" id="dato2" name="dato2" placeholder="" class="form-control" required>
                                        </div>
                                    </div>

                
                                </div>

                                <div class="form-group">
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





                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
