<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Anthero Vieira Neto',
            'email' => 'netooo@windsoft.com.br',
            'office_id' => 3,
            'password' => bcrypt('dp8d74kc'),
        ]);
        DB::table('users')->insert([
            'name' => 'Guilherme Dias',
            'email' => 'suporte3@windsoft.com.br',
            'office_id' => 3,
            'password' => bcrypt('secret'),
        ]);
        DB::table('users')->insert([
            'name' => 'Bruno Maquiaveli',
            'email' => 'supote4@windsoft.com.br',
            'office_id' => 2,
            'password' => bcrypt('secret'),
        ]);
        DB::table('users')->insert([
            'name' => 'Silas',
            'email' => 'suporte5@windsoft.com.br',
            'office_id' => 2,
            'password' => bcrypt('secret'),
        ]);
        DB::table('users')->insert([
            'name' => 'Vinícius Carmo',
            'office_id' => 2,
            'email' => 'suporte6@windsoft.com.br',
            'password' => bcrypt('secret'),
        ]);
        DB::table('users')->insert([
            'name' => 'Gilson Carmo',
            'office_id' => 1,
            'email' => 'gilsoncarmo@windsoft.com.br',
            'password' => bcrypt('secret'),
        ]);
    }
}
