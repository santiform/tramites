<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use App\Models\Venta;
use Illuminate\Http\Request;

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
    public function index()
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

        
        if ($tipoDeTramite == "1") {
            return view('venta.edit.aysa', compact('venta','estados','tramites'));
        }

        if ($tipoDeTramite == "2") {
            return "Vista para trámite de Infracciones";
        }

        if ($tipoDeTramite == "3") {
            return "Vista para trámite de VISA";
        }
     

        return view('venta.edit', compact('venta','estados','tramites'));
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

        return redirect()->route('ventas.index')
            ->with('editar', 'ok');
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
}
