@extends('layouts.app')

@section('template_title')
    {{ $venta->name ?? "{{ __('Show') Venta" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Venta</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('ventas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Tipo Tramite:</strong>
                            {{ $venta->tipo_tramite }}
                        </div>
                        <div class="form-group">
                            <strong>Cliente:</strong>
                            {{ $venta->cliente }}
                        </div>
                        <div class="form-group">
                            <strong>Costo:</strong>
                            {{ $venta->costo }}
                        </div>
                        <div class="form-group">
                            <strong>Precio Venta:</strong>
                            {{ $venta->precio_venta }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $venta->estado }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
