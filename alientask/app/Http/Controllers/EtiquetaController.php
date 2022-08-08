<?php

namespace App\Http\Controllers;

use App\Events\EtiquetaCriadaEvent;
use App\Events\EtiquetaEditadaEvent;
use App\Events\EtiquetaExcluidaEvent;
use App\Models\Etiqueta;
use App\Models\User;
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
        $user = Auth::user();
        $etiquetas = $user->etiquetas;
        return view('etiquetas.index', ['etiquetas' => $etiquetas]);
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
        $user = Auth::user();
        $etiqueta = new Etiqueta();
        $etiqueta->titulo = $request->titulo;
        $etiqueta->cor = $request->cor;
        $etiqueta->user_id = $user->id;
        $etiqueta->save();

        EtiquetaCriadaEvent::dispatch($user, $etiqueta);
        return redirect()->route('etiquetas-indice')
        ->with('msg', 'Etiqueta criada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Etiqueta  $etiqueta
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
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
        $user = Auth::user();
        $etiqueta = Etiqueta::findOrFail($id);
        $etiqueta->titulo = $request->titulo;
        $etiqueta->cor = $request->cor;
        $etiqueta->update();

        EtiquetaEditadaEvent::dispatch($user, $etiqueta);
        return redirect()->route('etiquetas-indice')
        ->with('msg', 'Etiqueta alterada com sucesso!');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Etiqueta  $etiqueta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Auth::user();
        $etiqueta = Etiqueta::findOrFail($id);
        $etiqueta->delete();

        EtiquetaExcluidaEvent::dispatch($user, $etiqueta);
        return redirect()->back()
        ->with('msg', 'Etiqueta excluída com sucesso!');
    }

    public function simpleStore(Request $request)
    {
        $user = Auth::user();
        $etiqueta = new Etiqueta();
        $etiqueta->titulo = $request->titulo;
        $etiqueta->cor = $request->cor;
        $etiqueta->user_id = $user->id;
        $etiqueta->save();

        EtiquetaExcluidaEvent::dispatch($user, $etiqueta);
        return redirect()->back()
        ->with('msg', 'Etiqueta criada com sucesso!');
    }
    
}
