<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('tarefas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tarefa = new Tarefa();
        $tarefa->titulo = $request->titulo;
        $tarefa->descricao = $request->descricao;
        $tarefa->data_final_prevista = $request->data_final_prevista;
        $tarefa->etiquetas = $request->etiquetas;
        $tarefa->user_id = Auth::user()->id;
        $tarefa->save();

        return redirect('dashboard')->with('msg', 'Tarefa criada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tarefas = Tarefa::findOrFail($id);

        return view('tarefas.show', ['tarefas' => $tarefas ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tarefa = Tarefa::findOrFail($id);

        return view('tarefas.edit', ['tarefa' => $tarefa]);
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
        $tarefa = Tarefa::findOrFail($id);
        $tarefa->titulo = $request->titulo;
        $tarefa->descricao = $request->descricao;
        $tarefa->data_final_prevista = $request->data_final_prevista;
        $tarefa->etiquetas = $request->etiquetas;
        $tarefa->update();

        return redirect('dashboard')->with('msg', 'Tarefa atualizda com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tarefa = Tarefa::findOrFail($id);
        $tarefa->delete();
        
        return redirect('dashboard')->with('msg', 'Tarefa excluída com sucesso!');
    }
    
    public function check($id)
    {
       $tarefa = Tarefa::findOrFail($id);
       if(!$tarefa->concluida)
       {
        $tarefa->concluida = 1;
       }
       else
       {
        $tarefa->concluida = 0;
       }
       $tarefa->update();

       return redirect('dashboard');
    }
}
