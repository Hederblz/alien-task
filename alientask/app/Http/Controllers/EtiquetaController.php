<?php

namespace App\Http\Controllers;

use App\Models\Etiqueta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EtiquetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('etiquetas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('etiquetas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $etiqueta = new Etiqueta();
        $etiqueta->titulo = $request->titulo;
        $etiqueta->cor = $request->cor;
        $etiqueta->user_id = Auth::user()->id;
        $etiqueta->save();

        return redirect()->back()
        ->with('msg', 'Etiqueta ' . $etiqueta->titulo . ' criada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Etiqueta  $etiqueta
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $etiqueta = Etiqueta::findOrFail($id);
        return view('etiquetas.show', ['etiqueta' => $etiqueta]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Etiqueta  $etiqueta
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $etiqueta = Etiqueta::findOrFail($id);
        return view('etiquetas.edit', ['etiqueta' => $etiqueta]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Etiqueta  $etiqueta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $etiqueta = Etiqueta::findOrFail($id);
        $etiqueta->titulo = $request->titulo;
        $etiqueta->cor = $request->cor;
        $etiqueta->update();
        
        return redirect('etiquetas.index')
        ->with('msg', 'Etiqueta ' . $etiqueta->titulo . ' alterada com sucesso!');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Etiqueta  $etiqueta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $etiqueta = Etiqueta::findOrFail($id);
        $etiqueta->delete();

        return redirect('etiquetas.index')
        ->with('msg', 'Etiqueta ' . $etiqueta->titulo . ' excluída com sucesso!');
    }
}
