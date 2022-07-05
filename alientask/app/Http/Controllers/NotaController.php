<?php

namespace App\Http\Controllers;

// use App\Events\CrudEvent;
use App\Events\NotaCriadaEvent;
use App\Events\NotaEditadaEvent;
use App\Events\NotaExcluidaEvent;
use App\Events\UserEvent;
use App\Exceptions\InvalidNoteException;
use App\Models\Nota;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isNull;

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
        $nota->titulo = $request->titulo ? $request->titulo : 'Nota sem titulo';
        $nota->conteudo = $request->conteudo;
        $nota->etiquetas = $request->etiquetas;
        $nota->markdown = $request->markdown ? $request->markdown : 0;
        $nota->user_id = $user->id;
        $nota->save();
        NotaCriadaEvent::dispatch($user, $nota->titulo);
        return redirect()->route('notas-index')
       ->with('msg', 'Nota criada com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        try{
            $nota = Nota::findOrFail($id);
        }
        catch(InvalidNoteException $e)
        {
            report($e);
            return false;
        }

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
        $nota->etiquetas = $request->etiquetas;
        $nota->update();
        NotaEditadaEvent::dispatch($user, $nota->titulo);
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
            NotaExcluidaEvent::dispatch($user, $nota->titulo);
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

}
