<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Situacao;
use Illuminate\Support\Facades\DB;

class SituacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Situacao::truncate();
        DB::table('situacaos')->insert([
            'nm_situacao' => 'Novo',
        ]);
        DB::table('situacaos')->insert([
            'nm_situacao' => 'Pendente',
        ]);
        DB::table('situacaos')->insert([
            'nm_situacao' => 'Resolvido',
        ]);
    }
}
