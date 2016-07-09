<?php

use Illuminate\Database\Seeder;

class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Query Builders
        DB::table('categorias')->insert([
            'nombre' => 'Deportes',
        ]);
        DB::table('categorias')->insert([
            'nombre' => 'Noticias',
        ]);
        DB::table('categorias')->insert([
            'nombre' => 'Anuncios',
        ]);
    }
}
