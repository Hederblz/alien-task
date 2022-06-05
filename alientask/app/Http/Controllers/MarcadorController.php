<?php

namespace App\Http\Controllers;

use App\Models\Marcador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MarcadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marcadores = Auth::user()->marcadores;
        return view('marcador.index', ['marcadores' => $marcadores]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('marcador.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Marcador::create([
            'titulo' => $request->titulo,
            'cor' => $request->cor,
            'tarefa_id' => $request->tarefa_id,
            'user_id' => Auth::user()->id
        ]);

        return redirect('marcador.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $marcadores = Marcador::findOrFail($id);

        return view('marcador.show', ['marcadores' => $marcadores]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $marcadores = Marcador::findOrFail($id);

        return view('marcador.edit', ['marcadores' => $marcadores]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Marcador $marcador, $id)
    {
        $marcador = Marcador::findOrFail($id);
        $marcador->titulo = $request->titulo;
        $marcador->cor = $request->cor;
        $marcador->tarefa_id = $request->tarefa_id;

        $marcador->update();

        return redirect('marcador.edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $marcador = Marcador::findOrFail($id);
        $marcador->delete();

        return redirect('marcador.index');
    }
}
