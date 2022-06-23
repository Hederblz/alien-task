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
        $tarefa = new Tarefa();
        $tarefa->titulo = $request->titulo;
        $tarefa->descricao = $request->descricao;
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
        $tarefa = Tarefa::findOrFail($id);
        $etiquetas = Auth::user()->etiquetas;

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
        $tarefa = Tarefa::findOrFail($id);
        $tarefa->titulo = $request->titulo;
        $tarefa->descricao = $request->descricao;
        $tarefa->etiquetas = $request->etiquetas;
        $tarefa->update();

        return redirect('dashboard')->with('msg', 'Tarefa atualizada com sucesso!');
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
        if(!$tarefa->trancada)
        {
            $tarefa->delete();
            return redirect('dashboard')->with('msg', 'Tarefa excluída com sucesso!');
        }
        else
        {
            return redirect('dashboard')
            ->with('msg', 'Não foi possível excluir a tarefa ' . $tarefa->titulo . ' pois está trancada.');
        }
        
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

    public function trancar($id)
    {
        $tarefa = Tarefa::findOrFail($id);
        if(!$tarefa->trancada)
        {
            $tarefa->trancada = 1;
            $tarefa->update();
            return redirect('dashboard')->with('msg', 'Tarefa ' . $tarefa->titulo . ' trancada.');
        }
        else
        {
            $tarefa->trancada = 0;
            $tarefa->update();
            return redirect('dashboard')->with('msg', 'Tarefa ' . $tarefa->titulo . ' destrancada.');
        }

    }
}
