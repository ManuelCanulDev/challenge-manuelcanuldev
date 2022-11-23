<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\Socio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

/**
 * Class ReservaController
 * @package App\Http\Controllers
 */
class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservas = Reserva::paginate();

        return view('reserva.index', compact('reservas'))
            ->with('i', (request()->input('page', 1) - 1) * $reservas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $socios = Socio::select(
            DB::raw("CONCAT(nombre,' ',apellido) AS name"),'id')
            ->pluck('name', 'id');

        $elegido = null;

        $reserva = new Reserva();
        return view('reserva.create', compact('reserva','socios','elegido'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Reserva::$rules);

        $reserva = Reserva::create($request->all());

        $text = "RESERVA REALIZADA ID ".$reserva->id.": ".$reserva->fecha_reserva.' PERTENECIENTE AL USUARIO: '.$reserva->socio->nombre.' '.$reserva->socio->apellido;

        Storage::disk('local')->put('reserva_'.date('Y_m_d_H_i_s').'.log', $text);

        return redirect()->route('reservas.index')
            ->with('success', 'Reserva created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reserva = Reserva::find($id);

        return view('reserva.show', compact('reserva'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $socios = Socio::select(
            DB::raw("CONCAT(nombre,' ',apellido) AS name"),'id')
            ->pluck('name', 'id');

        $reserva = Reserva::find($id);

        $elegido = $reserva->socio_id;

        return view('reserva.edit', compact('reserva','socios','elegido'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Reserva $reserva
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reserva $reserva)
    {
        request()->validate(Reserva::$rules);

        $reserva->update($request->all());

        return redirect()->route('reservas.index')
            ->with('success', 'Reserva updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $reserva = Reserva::find($id)->delete();

        return redirect()->route('reservas.index')
            ->with('success', 'Reserva deleted successfully');
    }
}
