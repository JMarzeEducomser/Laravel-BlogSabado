<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            'nombre' => 'Desarrollo',
        ]);
        DB::table('tags')->insert([
            'nombre' => 'Web',
        ]);
        DB::table('tags')->insert([
            'nombre' => 'Seguridad',
        ]);
        DB::table('tags')->insert([
            'nombre' => 'Laravel',
        ]);
    }
}
