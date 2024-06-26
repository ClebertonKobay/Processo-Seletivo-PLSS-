<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\Categoria;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categoria::truncate();
        DB::table('categorias')->insert([
            'nm_categoria' => 'Sistemas',

        ]);
        DB::table('categorias')->insert([
            'nm_categoria' => 'Suporte',

        ]);
        DB::table('categorias')->insert([
            'nm_categoria' => 'Redes',

        ]);
        DB::table('categorias')->insert([
            'nm_categoria' => 'Outros',

        ]);
    }
}
