<?php

namespace App\Http\Controllers;

use App\Models\Butaca;
use App\Models\Reserva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class ButacaController
 * @package App\Http\Controllers
 */
class ButacaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $butacas = Butaca::paginate();

        return view('butaca.index', compact('butacas'))
            ->with('i', (request()->input('page', 1) - 1) * $butacas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $butaca = new Butaca();


        $reservas = Reserva::select(
            DB::raw("CONCAT('ID = ',id,' Y FECHA = ',fecha_reserva) AS fecha"),
            'id'
        )->pluck('fecha', 'id');

        $elegido = null;
        return view('butaca.create', compact('butaca', 'reservas', 'elegido'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Butaca::$rules, Butaca::$messages);

        $butaca = Butaca::create($request->all());

        return redirect()->route('butacas.index')
            ->with('success', 'Butaca created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $butaca = Butaca::find($id);

        return view('butaca.show', compact('butaca'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $reservas = Reserva::select(
            DB::raw("CONCAT('ID =',id,' Y FECHA =',fecha_reserva) AS fecha"),
            'id'
        )->pluck('fecha', 'id');




        $butaca = Butaca::find($id);

        $elegido = $butaca->id;

        return view('butaca.edit', compact('butaca', 'reservas', 'elegido'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Butaca $butaca
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Butaca $butaca)
    {
        request()->validate([
            'reserva_id' => 'required',
            'butaca_fila' => 'required|unique:butacas,butaca_fila,'.$butaca->id.',id,deleted_at,NULL|integer|between:1,5',
            'butaca_columna' => 'required|unique:butacas,butaca_columna,'.$butaca->id.',id,deleted_at,NULL|integer|between:1,10',
        ],Butaca::$messages);

        $butaca->update($request->all());

        return redirect()->route('butacas.index')
            ->with('success', 'Butaca updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $butaca = Butaca::find($id)->delete();

        return redirect()->route('butacas.index')
            ->with('success', 'Butaca deleted successfully');
    }
}
