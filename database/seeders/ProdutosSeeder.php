<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdutosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        DB::table('produtos')->truncate();

        // Insere 20 produtos falsos
        for ($i = 1; $i <= 20; $i++) {
            DB::table('produtos')->insert([
                'produto' => 'Produto ' . $i,
                'descricao' => 'Descrição do Produto ' . $i,
                'preco' => rand(10, 100),
                'estoque' => rand(0, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }


    }
}
