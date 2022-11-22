<?php

namespace App\Http\Controllers;

use App\Models\Butaca;
use Illuminate\Http\Request;

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
        return view('butaca.create', compact('butaca'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Butaca::$rules);

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
        $butaca = Butaca::find($id);

        return view('butaca.edit', compact('butaca'));
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
        request()->validate(Butaca::$rules);

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
