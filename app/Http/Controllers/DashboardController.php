<?php

namespace App\Http\Controllers;

use App\Models\Chamados;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $QtdchamadosResolvidos = Chamados::all()->count();
        $QtdchamadosCriados = Chamados::all()->count();

        $diasgrafico = [];
        $dt = Carbon::now()->startOfMonth();
        $dt2 = Carbon::now();
        $dias = CarbonPeriod::create($dt, $dt2)->toArray();
        foreach ($dias as $dia) {
            $diasgrafico[] = $dia->format('d');
        }

        $chamadosCriadosPorDia = [];
        foreach ($dias as $dia) {
            $chamadosCriadosPorDia[$dia->format('d')] = Chamados::whereDate('created_at', $dia)
                ->count();
        }

        $chamadosResolvidosPorDia = [];
        foreach ($dias as $dia) {
            $chamadosResolvidosPorDia[$dia->format('d')] = Chamados::whereDate('created_at', $dia)
                ->where('situacao_id', 3)
                ->count();
        }


        return response()->json(
            [
                'dias' => $diasgrafico,
                'chamadosCriados' => $chamadosCriadosPorDia,
                'chamadosResolvidos' => $chamadosResolvidosPorDia,
                'QtdchamadosCriados' => $QtdchamadosCriados,
                'QtdchamadosResolvidos' => $QtdchamadosResolvidos,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
