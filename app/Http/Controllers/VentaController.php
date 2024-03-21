<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use App\Models\Venta;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\URL;

/**
 * Class VentaController
 * @package App\Http\Controllers
 */
class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index2()
    {
        $ventas = DB::table('ventas')
            ->leftJoin('estados', 'ventas.id_estado', '=', 'estados.id')
            ->leftJoin('tramites', 'ventas.id_tramite', '=', 'tramites.id')
            ->select('ventas.*', 'estados.nombre as nombre_estado', 'tramites.nombre as nombre_tramite')
            ->get();

        // Calcular la ganancia para cada venta
        foreach ($ventas as $venta) {
            $ganancia = $venta->precio_venta - $venta->costo;
            $venta->ganancia = $ganancia;
        }
        
        return view('venta.index', compact('ventas','ganancia'));
    }



        public function index()
    {
        $ventas = $this->getTodasLasVentas();
        return view('venta.index', compact('ventas'));
    }

    public function getTodasLasVentas()
    {
        $ventas = DB::table('ventas')
            ->leftJoin('estados', 'ventas.id_estado', '=', 'estados.id')
            ->leftJoin('tramites', 'ventas.id_tramite', '=', 'tramites.id')
            ->select('ventas.*', 'estados.nombre as nombre_estado', 'tramites.nombre as nombre_tramite')
            ->get();

        // Calcular la ganancia para cada venta
        foreach ($ventas as $venta) {
            $ganancia = $venta->precio_venta - $venta->costo;
            $venta->ganancia = $ganancia;
        }

        return $ventas;
    }

    public function ventasSolicitudes()
    {
        $ventas = $this->getVentasByEstado('solicitud');

        if ($ventas->isEmpty()) {
        return view('venta.no-registros.solicitudes');
        }

        return view('venta.solicitudes', compact('ventas'));
    }

    public function ventasPresupuestos()
    {
        $ventas = $this->getVentasByEstado('presupuesto');

        if ($ventas->isEmpty()) {
        return view('venta.no-registros.presupuestos');
        }

        return view('venta.presupuestos', compact('ventas'));
    }

    public function ventasEnviados()
    {
        $ventas = $this->getVentasByEstado('enviado al cliente');

        if ($ventas->isEmpty()) {
        return view('venta.no-registros.enviados');
        }

        return view('venta.enviados', compact('ventas'));
    }

    public function ventasConfirmados()
    {
        $ventas = $this->getVentasByEstado('confirmado');

        if ($ventas->isEmpty()) {
        return view('venta.no-registros.confirmados');
        }

        return view('venta.confirmados', compact('ventas'));
    }

    public function ventasFinalizados()
    {
        $ventas = $this->getVentasByEstado('finalizado');
        return view('venta.finalizados', compact('ventas'));
    }

    public function getVentasByEstado($estado)
    {
        $ventas = DB::table('ventas')
            ->leftJoin('estados', 'ventas.id_estado', '=', 'estados.id')
            ->leftJoin('tramites', 'ventas.id_tramite', '=', 'tramites.id')
            ->select('ventas.*', 'estados.nombre as nombre_estado', 'tramites.nombre as nombre_tramite')
            ->where('estados.nombre', $estado)
            ->get();

        // Calcular la ganancia para cada venta
        foreach ($ventas as $venta) {
            $ganancia = $venta->precio_venta - $venta->costo;
            $venta->ganancia = $ganancia;
        }

        return $ventas;
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $venta = new Venta();

        $tramites = DB::table('tramites')->get();        
        $estados = DB::table('estados')->get();    

        return view('venta.create', compact('venta','estados','tramites'));
    }

    public function create2(Request $request)
    {   
        $tipoDeTramite = $request->input('id_tramite');

        $formaDePago = $request->input('forma_pago');

        $estado = $request->input('id_estado');

        if (($formaDePago == "A confirmar" || $formaDePago === null) && ($estado == 4 || $estado == 5)) {
            return redirect()->route('ventas.create')->with('noFormaPago', 'ok');
        }

        if ($tipoDeTramite === "1") {
            return view ('venta.create.aysa')->with('data', $request);
        }

        if ($tipoDeTramite === "2") {
            return view ('venta.create.infracciones')->with('data', $request);
        }

        if ($tipoDeTramite === "3") {
            return "Vista para trámite de VISA";
        }

        if ($tipoDeTramite === "5") {
            return view ('venta.create.dni-extranjero')->with('data', $request);
        }

        if ($tipoDeTramite === "6") {
            return view ('venta.create.cambio-titularidad')->with('data', $request);
        }

        if ($tipoDeTramite === "7") {
            return view ('venta.create.antecedentes-penales')->with('data', $request);
        }

        if ($tipoDeTramite === "8") {
            return view ('venta.create.afip')->with('data', $request);
        }

        if ($tipoDeTramite === "9") {
            return view ('venta.create.anses')->with('data', $request);
        }

        if ($tipoDeTramite === "10") {
            return view ('venta.create.arba')->with('data', $request);
        }

        if ($tipoDeTramite === "11") {
            return view ('venta.create.certificacion-migratoria')->with('data', $request);
        }

        if ($tipoDeTramite === "12") {
            return view ('venta.create.legalizaciones-internacionales')->with('data', $request);
        }

        if ($tipoDeTramite === "13") {
            return view ('venta.create.partida-defuncion')->with('data', $request);
        }

        if ($tipoDeTramite === "14") {
            return view ('venta.create.partida-matrimonio')->with('data', $request);
        }

        if ($tipoDeTramite === "15") {
            return view ('venta.create.partida-nacimiento')->with('data', $request);
        }



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Venta::$rules);

        $venta = Venta::create($request->all());

        $urlAnterior = URL::previous();

        if ($urlAnterior === 'https://localhost/tramites/public/ventas-solicitudes') {
            $ventas = $this->getVentasByEstado('solicitud');
            return redirect()->route('ventas.solicitudes')->with('crear', 'ok');
        }

        if ($urlAnterior === 'https://localhost/tramites/public/ventas-presupuestos') {
            $ventas = $this->getVentasByEstado('presupuesto');
            return redirect()->route('ventas.presupuestos')->with('crear', 'ok');
        }

        if ($urlAnterior === 'https://localhost/tramites/public/ventas-enviados-al-cliente') {
            $ventas = $this->getVentasByEstado('enviado');
            return redirect()->route('ventas.enviados')->with('crear', 'ok');
        }

        if ($urlAnterior === 'https://localhost/tramites/public/ventas-confirmados') {
            $ventas = $this->getVentasByEstado('confirmado');
            return redirect()->route('ventas.confirmados')->with('crear', 'ok');
        }

        if ($urlAnterior === 'https://localhost/tramites/public/ventas-finalizados') {
            $ventas = $this->getVentasByEstado('finalizado');
            return redirect()->route('ventas.finalizados')->with('crear', 'ok');
        }

        return redirect()->route('ventas.index')
            ->with('crear', 'ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $venta = Venta::find($id);

        $tipoDeTramite = DB::table('ventas')->where('id', $id)->value('id_tramite');

        $tipoTramiteLetras = DB::table('tramites')->where('id', $tipoDeTramite)->value('nombre');

        $venta = Venta::find($id);

        $ganancia = $venta->precio_venta - $venta->costo;

        $estado = DB::table('ventas')->where('id', $id)->value('id_estado');

        $estadoLetras = DB::table('estados')->where('id', $estado)->value('nombre');

        if ($tipoDeTramite == "1") {
            return view('venta.show.aysa', compact('venta','estadoLetras','tipoTramiteLetras', 'ganancia'));
        }

        if ($tipoDeTramite == "2") {
            return "Vista para trámite de Infracciones";
        }

        if ($tipoDeTramite == "3") {
            return "Vista para trámite de VISA";
        }

        return view('venta.show', compact('venta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipoDeTramite = DB::table('ventas')->where('id', $id)->value('id_tramite');

        $venta = Venta::find($id);
        $tramites = DB::table('tramites')->get();        
        $estados = DB::table('estados')->get(); 

        $previousUrl = url()->previous();

        
        if ($tipoDeTramite == "1") {
            return view('venta.edit.aysa', compact('venta','estados','tramites','previousUrl'));
        }

        if ($tipoDeTramite == "2") {
            return "Vista para trámite de Infracciones";
        }

        if ($tipoDeTramite == "3") {
            return "Vista para trámite de VISA";
        }

        return view('venta.edit', compact('venta','estados','tramites','previousUrl'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Venta $venta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venta $venta)
    {
        request()->validate(Venta::$rules);

        $venta->update($request->all());

        $urlAnterior = URL::previous();

        if ($urlAnterior === 'https://localhost/tramites/public/ventas-solicitudes') {
            $ventas = $this->getVentasByEstado('solicitud');
            return redirect()->route('ventas.solicitudes')->with('editar', 'ok');
        }

        if ($urlAnterior === 'https://localhost/tramites/public/ventas-presupuestos') {
            $ventas = $this->getVentasByEstado('presupuesto');
            return redirect()->route('ventas.presupuestos')->with('editar', 'ok');
        }

        if ($urlAnterior === 'https://localhost/tramites/public/ventas-enviados-al-cliente') {
            $ventas = $this->getVentasByEstado('enviado');
            return redirect()->route('ventas.enviados')->with('editar', 'ok');
        }

        if ($urlAnterior === 'https://localhost/tramites/public/ventas-confirmados') {
            $ventas = $this->getVentasByEstado('confirmado');
            return redirect()->route('ventas.confirmados')->with('editar', 'ok');
        }

        if ($urlAnterior === 'https://localhost/tramites/public/ventas-finalizados') {
            $ventas = $this->getVentasByEstado('finalizado');
            return redirect()->route('ventas.finalizados')->with('editar', 'ok');
        }

        // Redirigir al usuario a la URL anterior de la anterior
        return redirect($request->input('previousUrl'))->with('editar', 'ok');
    }



    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $venta = Venta::find($id)->delete();

        $urlAnterior = URL::previous();

        if ($urlAnterior === 'https://localhost/tramites/public/ventas-solicitudes') {
            $ventas = $this->getVentasByEstado('solicitud');
            return redirect()->route('ventas.solicitudes')->with('borrar', 'ok');
        }

        if ($urlAnterior === 'https://localhost/tramites/public/ventas-presupuestos') {
            $ventas = $this->getVentasByEstado('presupuesto');
            return redirect()->route('ventas.presupuestos')->with('borrar', 'ok');
        }

        if ($urlAnterior === 'https://localhost/tramites/public/ventas-enviados-al-cliente') {
            $ventas = $this->getVentasByEstado('enviado');
            return redirect()->route('ventas.enviados')->with('borrar', 'ok');
        }

        if ($urlAnterior === 'https://localhost/tramites/public/ventas-confirmados') {
            $ventas = $this->getVentasByEstado('confirmado');
            return redirect()->route('ventas.confirmados')->with('borrar', 'ok');
        }

        if ($urlAnterior === 'https://localhost/tramites/public/ventas-finalizados') {
            $ventas = $this->getVentasByEstado('finalizado');
            return redirect()->route('ventas.finalizados')->with('borrar', 'ok');
        }

        return redirect()->route('ventas.index')
            ->with('borrar', 'ok');
    }

    public function solicitud($id) {
        Venta::where('id', $id)->update(['id_estado' => '1']);
        $venta = Venta::find($id);

        $urlAnterior = URL::previous();

        if ($urlAnterior === 'https://localhost/tramites/public/ventas-presupuestos') {

            $ventas = $this->getVentasByEstado('presupuesto');
            return redirect()->route('ventas.presupuestos', compact('ventas'));
        }

        return redirect()->route('ventas.show', compact('venta'));
    }

    public function presupuesto($id) {
        Venta::where('id', $id)->update(['id_estado' => '2']);
        $venta = Venta::find($id);

        $urlAnterior = URL::previous();

        if ($urlAnterior === 'https://localhost/tramites/public/ventas-solicitudes') {

            $ventas = $this->getVentasByEstado('solicitud');
            return redirect()->route('ventas.solicitudes', compact('ventas'));
        }

        $urlAnterior = URL::previous();

        if ($urlAnterior === 'https://localhost/tramites/public/ventas-enviados-al-cliente') {

            $ventas = $this->getVentasByEstado('enviado');
            return redirect()->route('ventas.enviados', compact('ventas'));
        }

        return redirect()->route('ventas.show', compact('venta'))
            ->with('id', $id);
    }

    public function enviado($id) {
        Venta::where('id', $id)->update(['id_estado' => '3']);
        $venta = Venta::find($id);

        $urlAnterior = URL::previous();

        if ($urlAnterior === 'https://localhost/tramites/public/ventas-presupuestos') {

            $ventas = $this->getVentasByEstado('presupuesto');
            return redirect()->route('ventas.presupuestos', compact('ventas'));
        }

        $urlAnterior = URL::previous();

        if ($urlAnterior === 'https://localhost/tramites/public/ventas-confirmados') {

            $ventas = $this->getVentasByEstado('confirmado');
            return redirect()->route('ventas.confirmados', compact('ventas'));
        }
        
        return redirect()->route('ventas.show', compact('venta'))
            ->with('id', $id);
    }

    public function confirmado($id) {

        $venta = Venta::find($id);

        $formaDePago = $venta->forma_pago;

        $urlAnterior = URL::previous();

        if ($formaDePago == "A confirmar" || $formaDePago === null) {
            $ventas = $this->getVentasByEstado('enviado');
            return redirect($urlAnterior)->with('noFormaPago', 'ok');
        }




        Venta::where('id', $id)->update(['id_estado' => '4']);

        $venta = Venta::find($id);

        

        if ($urlAnterior === 'https://localhost/tramites/public/ventas-enviados-al-cliente') {

            $ventas = $this->getVentasByEstado('enviado');
            return redirect()->route('ventas.enviados', compact('ventas'));
        }

        if ($urlAnterior === 'https://localhost/tramites/public/ventas-finalizados') {

            $ventas = $this->getVentasByEstado('finalizado');
            return redirect()->route('ventas.finalizados', compact('ventas'));
        }

        return redirect()->route('ventas.show', compact('venta'))
            ->with('id', $id);
    }

    public function finalizado($id) {
        Venta::where('id', $id)->update(['id_estado' => '5']);
        $venta = Venta::find($id);

        $urlAnterior = URL::previous();

        if ($urlAnterior === 'https://localhost/tramites/public/ventas-confirmados') {

            $ventas = $this->getVentasByEstado('confirmado');
            return redirect()->route('ventas.confirmados', compact('ventas'));
        }

        return redirect()->route('ventas.show', compact('venta'))
            ->with('id', $id);
    }


}
