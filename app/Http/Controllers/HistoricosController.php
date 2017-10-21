<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Historico; // Adiciona o uso do model para o controller
use App\Http\Controllers\Controller;
use App\Http\Requests\HistoricoRequest;

class HistoricosController extends Controller
{
    public function index() {
        $historicos = Historico::all();
        return view('historicos.index',
            ['historicos'=>$historicos]);
    }

    public function create() {
        return view('historicos.create');
    }

    public function store(HistoricoRequest $request) {
        $novo_historico = $request->all();
        Historico::create($novo_historico);

        return redirect()->route('historicos');
    }

    public function destroy($id) {
        Historico::find($id)->delete();
        return redirect()->route('historicos');
    }

    public function edit($id) {
        $historico = Historico::find($id);
        return view('historico.edit', compact('historico'));
    }

    public function update(HistoricoRequest $request, $id) {
        $historico = Historico::find($id)->update($request->all());
        return redirect()->route('historicos');
    }
}
