<?php

namespace App\Http\Controllers;

use App\Models\Historico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoricoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $historicos = Auth::user()->historicos;
        return view('historico.index', ['historicos' => $historicos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        Historico::create([
            'acao' => $request->acao,
            'data' => $request->data,
            'tarefa_id' => Auth::tarefa()->id
        ]); 

        return redirect('/dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Historico  $historico
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $historicos = Historico::findOrFail($id);

        return view('historicos.show', ['historicos' => $historicos ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Historico  $historico
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Historico  $historico
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Historico  $historico
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $historico = Historico::findOrFail($id);
        $historico->delete();

        return redirect('historicos.index');
    }
}
