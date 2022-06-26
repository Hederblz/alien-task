<?php

namespace App\Http\Controllers;

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
        $this->incrementarEtiquetaCriada($user->id);
        return redirect()->route('etiquetas-index')
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
        $this->incrementarEtiquetaEditada($user->id);        
        return redirect('dashboard')
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
        $user = Auth::user();
        $etiqueta = Etiqueta::findOrFail($id);
        $etiqueta->delete();
        $this->incrementarEtiquetaExcluida($user->id);
        return redirect('dashboard')
        ->with('msg', 'Etiqueta ' . $etiqueta->titulo . ' excluída com sucesso!');
    }

    public function simpleStore(Request $request)
    {
        $user = Auth::user();
        $etiqueta = new Etiqueta();
        $etiqueta->titulo = $request->titulo;
        $etiqueta->cor = $request->cor;
        $etiqueta->user_id = $user->id;
        $etiqueta->save();
        $this->incrementarEtiquetaCriada($user->id);
        return redirect()->back()
        ->with('msg', 'Etiqueta ' . $etiqueta->titulo . ' criada com sucesso!');
    }

    // ATRIBUTES

    public function incrementarEtiquetaCriada($id)
    {
        $user = User::findOrFail($id);
        $user->etiquetas_criadas++;
        $user->update();
    }

    public function incrementarEtiquetaEditada($id)
    {
        $user = User::findOrFail($id);
        $user->etiquetas_editadas++;
        $user->update();
    }

    public function incrementarEtiquetaExcluida($id)
    {
        $user = User::findOrFail($id);
        $user->etiquetas_excluidas++;
        $user->update();
    }
}
