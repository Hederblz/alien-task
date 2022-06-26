<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notas = Auth::user()->notas;
       return view('notas.index', ['notas'=> $notas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $etiquetas = Auth::user()->etiquetas;
        return view('notas.create', ['etiquetas' => $etiquetas]);
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
        $nota = new Nota();
        if(empty($request->titulo))
        {
            $nota->titulo = 'Nota sem titulo';
        }
        else
        {
            $nota->titulo = $request->titulo;
        }
        $nota->conteudo = $request->conteudo;
        $nota->etiquetas = $request->etiquetas;
        $nota->user_id = $user->id;
        $nota->save();
        $this->incrementarNotaCriada($user->id);
        return redirect()->route('notas-index')
       ->with('msg', 'Nota excluída com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $nota = Nota::findOrFail($id);

        return view('notas.show', ['nota' => $nota]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nota = Nota::findOrFail($id);
        $etiquetas = Auth::user()->etiquetas;

        return view('notas.edit', ['nota' => $nota, 'etiquetas' => $etiquetas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nota $nota,$id)
    {
        $user = Auth::user();
        $nota = Nota::findOrFail($id);
        if(empty($request->titulo))
        {
            $nota->titulo = 'Nota sem titulo';
        }
        else
        {
            $nota->titulo = $request->titulo;
        }
        $nota->conteudo = $request->conteudo;
        $nota->update();
        $this->incrementarNotaEditada($user->id);
        return redirect()->route('notas-index')->with('msg', "Nota $nota->titulo atualizada com sucesso.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Auth::user();
        $nota = Nota::findOrFail($id);
        if(!$nota->trancada)
        {
            $nota->delete();
            $this->incrementarNotaExcluida($user->id);
            return redirect()->route('notas-index')->with('msg', 'Nota excluída com sucesso!');
        }
        else
        {
            return redirect()->route('notas-index')
            ->with('msg', 'Não foi possível excluir a nota ' . $nota->titulo . ' pois está trancada.');
        }
    }

    public function trancar($id)
    {
        $nota = Nota::findOrFail($id);
        if(!$nota->trancada)
        {
            $nota->trancada = 1;
        }
        else
        {
            $nota->trancada = 0;
        }
        $nota->update();

        return redirect()->route('notas-index');
    }

    // ATRIBUTES

    public function incrementarNotaCriada($id)
    {
        $user = User::findOrFail($id);
        $user->notas_criadas++;
        $user->update();
    }

    public function incrementarNotaEditada($id)
    {
        $user = User::findOrFail($id);
        $user->notas_editadas++;
        $user->update();
    }

    public function incrementarNotaExcluida($id)
    {
        $user = User::findOrFail($id);
        $user->notas_excluidas++;
        $user->update();
    }
}
