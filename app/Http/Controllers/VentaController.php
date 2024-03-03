<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use App\Models\Venta;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

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
        return view('venta.solicitudes', compact('ventas'));
    }

    public function ventasPresupuestos()
    {
        $ventas = $this->getVentasByEstado('presupuesto');
        return view('venta.presupuestos', compact('ventas'));
    }

    public function ventasEnviados()
    {
        $ventas = $this->getVentasByEstado('enviado al cliente');
        return view('venta.enviados', compact('ventas'));
    }

    public function ventasConfirmados()
    {
        $ventas = $this->getVentasByEstado('confirmado');
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

        if ($tipoDeTramite === "1") {
            return view ('venta.create.aysa')->with('data', $request);
        }

        if ($tipoDeTramite === "2") {
            return "Vista para trámite de Infracciones";
        }

        if ($tipoDeTramite === "3") {
            return "Vista para trámite de VISA";
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

        return redirect()->route('ventas.index')
            ->with('borrar', 'ok');
    }

    public function solicitud($id) {
        Venta::where('id', $id)->update(['id_estado' => '1']);
        $venta = Venta::find($id);
        return redirect()->route('ventas.show', compact('venta'))
            ->with('id', $id);
    }

    public function presupuesto($id) {
        Venta::where('id', $id)->update(['id_estado' => '2']);
        $venta = Venta::find($id);
        return redirect()->route('ventas.show', compact('venta'))
            ->with('id', $id);
    }

    public function enviado($id) {
        Venta::where('id', $id)->update(['id_estado' => '3']);
        $venta = Venta::find($id);
        return redirect()->route('ventas.show', compact('venta'))
            ->with('id', $id);
    }

    public function confirmado($id) {
        Venta::where('id', $id)->update(['id_estado' => '4']);
        $venta = Venta::find($id);
        return redirect()->route('ventas.show', compact('venta'))
            ->with('id', $id);
    }

    public function finalizado($id) {
        Venta::where('id', $id)->update(['id_estado' => '5']);
        $venta = Venta::find($id);
        return redirect()->route('ventas.show', compact('venta'))
            ->with('id', $id);
    }



    public function solicitud2($id) {
        $ventas = $this->getVentasByEstado('solicitud');

        return redirect()->route('ventas.solicitudes', compact('ventas'));
    }

     public function presupuesto2($id) {

        Venta::where('id', $id)->update(['id_estado' => '2']);

        $ventas = $this->getVentasByEstado('presupuestos');

        return back()->with('ventas', $ventas);

    }


}
