<?php

namespace App\Http\Controllers;

use App\Events\TarefaConcluidaEvent;
use App\Events\TarefaCriadaEvent;
use App\Events\TarefaEditadaEvent;
use App\Events\TarefaExcluidaEvent;
use App\Models\Tarefa;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class TarefaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tarefas = Auth::user()->tarefas;
        return view('tarefas.index', ['tarefas' => $tarefas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $etiquetas = Auth::user()->etiquetas;
        return view('tarefas.create', ['etiquetas' => $etiquetas]);
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
        $tarefa = new Tarefa();
        $tarefa->titulo = $request->titulo;
        $tarefa->descricao = $request->descricao;
        $tarefa->data_final_prevista = $request->data_final_prevista;
        $tarefa->etiquetas = $request->etiquetas;
        $tarefa->user_id = $user->id;
        $tarefa->save();
        TarefaCriadaEvent::dispatch($user, $tarefa->titulo);
        return redirect()->route('tarefas-index')->with('msg', 'Tarefa criada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        $tarefa = Tarefa::findOrFail($id);
        $etiquetas = $user->etiquetas;

        return view('tarefas.edit', ['tarefa' => $tarefa, 'etiquetas' => $etiquetas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $tarefa = Tarefa::findOrFail($id);
        $tarefa->titulo = $request->titulo;
        $tarefa->descricao = $request->descricao;
        $tarefa->data_final_prevista = $request->data_final_prevista;
        $tarefa->etiquetas = $request->etiquetas;
        $tarefa->update();
        TarefaEditadaEvent::dispatch($user, $tarefa->titulo);
        return redirect()->route('tarefas-index')->with('msg', 'Tarefa atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Auth::user();
        $tarefa = Tarefa::findOrFail($id);
        if(!$tarefa->trancada)
        {
            $tarefa->delete();
            TarefaExcluidaEvent::dispatch($user, $tarefa->titulo);
            return redirect()->route('tarefas-index')
            ->with('msg', "Tarefa excluída com sucesso.");
        }
        else
        {
            return redirect()->route('tarefas-index')
            ->with('msg', "Não foi possivel excluir a tarefa $tarefa->titulo pois etá trancada.");
        }
        
    }
    
    public function check($id)
    {
       $user = Auth::user();
       $tarefa = Tarefa::findOrFail($id);
       if(!$tarefa->concluida)
       {
        $tarefa->concluida = 1;
        $tarefa->data_conclusao = date('Y-m-d');
        TarefaConcluidaEvent::dispatch($user, $tarefa->titulo);
       }
       else
       {
        $tarefa->concluida = 0;
       }
       $tarefa->update();

       return redirect()->route('tarefas-index');
    }

    public function trancar($id)
    {
        $tarefa = Tarefa::findOrFail($id);
        if(!$tarefa->trancada)
        {
            $tarefa->trancada = 1;
            $tarefa->update();
            return redirect()->route('tarefas-index')->with('msg', 'Tarefa ' . $tarefa->titulo . ' trancada.');
        }
        else
        {
            $tarefa->trancada = 0;
            $tarefa->update();
            return redirect()->route('tarefas-index')->with('msg', 'Tarefa ' . $tarefa->titulo . ' destrancada.');
        }

    }

}
