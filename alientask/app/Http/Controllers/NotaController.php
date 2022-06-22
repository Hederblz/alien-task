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
        return view('notas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Nota::create([
            'titulo' => $request->titulo,
            'conteudo' => $request->conteudo,
            'user_id' => Auth::user()->id
    ]);
        return redirect('/dashboard')->with('msg', 'Nota criada com sucesso!');
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
    public function edit( $id)
    {
        $nota = Nota::findOrFail($id);

        return view('notas.edit', ['nota' => $nota]);
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

        return redirect('dashboard')->with('msg', 'Nota atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nota = Nota::findOrFail($id);
        $nota->delete();

        return redirect('dashboard')->with('msg', 'Nota excluída com sucesso!');
    }

    public function trancar($id)
    {
        $nota = Nota::findOrFail($id);
        if(!$nota->trancada)
        {
            $nota->trancada = 1;
            $nota->update();
            return redirect('dashboard')->with('msg', 'Tarefa ' . $nota->titulo . ' trancada.');
        }
        else
        {
            $nota->trancada = 0;
            $nota->update();
            return redirect('dashboard')->with('msg', 'Tarefa ' . $nota->titulo . ' destrancada.');
        }
    }
}
