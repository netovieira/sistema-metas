<?php

use Illuminate\Database\Seeder;

class OfficeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('offices')->insert([
            'id' => 1,
            'name' => 'Administrativo'
        ]);
        DB::table('offices')->insert([
            'id' => 2,
            'name' => 'Suporte',
            'boss_id' => 1
        ]);
        DB::table('offices')->insert([
            'id' => 3,
            'name' => 'Desenvolvimento',
            'boss_id' => 1
        ]);
    }
}
