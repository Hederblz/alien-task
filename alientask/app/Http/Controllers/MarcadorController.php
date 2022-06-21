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
        return view('marcadores.index', compact($marcadores));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('marcadores.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $marcador = new Marcador();
        $marcador->titulo = $request->titulo;
        $marcador->cor = $request->cor;
        $marcador->user_id = Auth::user()->id;
        $marcador->save();

        return redirect('marcadores.index')
        ->with('msg', 'Marcador ' . $marcador->titulo . ' criado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Marcador  $marcador
     * @return \Illuminate\Http\Response
     */
    public function show(Marcador $marcador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Marcador  $marcador
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $marcador = Marcador::findOrFail($id);
        return view('marcadores.edit', compact($marcador));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Marcador  $marcador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $marcador = Marcador::findOrFail($id);
        $marcador->titulo = $request->titulo;
        $marcador->cor;
        $marcador->update();

        return redirect('marcadores.index')
        ->with('msg', 'Marcador ' . $marcador->titulo . ' atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Marcador  $marcador
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $marcador = Marcador::findOrFail($id);
        $marcador->delete();

        return redirect('marcadores.index')
        ->with('msg', 'Marcador ' . $marcador->titulo . ' excluído com sucesso!');
    }
}
