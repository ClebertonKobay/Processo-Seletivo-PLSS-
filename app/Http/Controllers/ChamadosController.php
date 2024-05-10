<?php

namespace App\Http\Controllers;

use App\DataTables\ChamadosDataTable;
use App\Models\Categoria;
use App\Models\Chamados;
use App\Http\Requests\ChamadosRequest;
use App\Http\Requests\UpdateChamadoRequest;
use App\Models\Situacao;
use Carbon\Carbon;

class ChamadosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ChamadosDataTable $dataTable)
    {
        return $dataTable->render('chamados.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('chamados.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ChamadosRequest $request)
    {
        try {
            $validate = $request->validated();
            $validate['prazo_solucao'] = Carbon::now()->addDay(3);
            $situacao = Situacao::find(1);
            $validate['situacao_id'] = $situacao->id;

            Chamados::create($validate);
            return redirect()->route('chamados.index')->with('alert-success', 'Chamado Criado com Sucesso');
        } catch (\Error $error) {
            return redirect()->route('chamados.index')->with('alert-danger', $error->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Chamados $chamado)
    {
        return view('chamados.show', compact('chamado'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chamados $chamado)
    {
        $categorias = Categoria::all();
        $situacaos = Situacao::all();
        return view('chamados.edit', compact('chamado', 'situacaos', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChamadoRequest $request, Chamados $chamado)
    {
        try {
            $validate = $request->validated();
            $situacao = Situacao::find(3);

            if ($situacao->id == $validate['situacao_id']) {
                $validate['data_solucao'] = Carbon::now();
            }

            $chamado->update($validate);
            return redirect()->route('chamados.index')->with('alert-success', 'Chamado Atualizado com Sucesso');
        } catch (\Error $error) {
            return redirect()->route('chamados.index')->with('alert-danger', $error->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chamados $chamado)
    {
        $chamado->delete();
        return redirect()->route('chamados.index')->with('alert-success', 'Chamado excluido com sucesso');
    }
}
