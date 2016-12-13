<?php

use Illuminate\Database\Seeder;

class GoalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('goals')->insert([
            'name' => 'Cursos e atividades extras',
            'description' => 'Descreva aqui os cursos onde você participou que não têm relação à sua função na empresa',
            'do_id' => '3',
            'do_type' => 'App\Office',
        ]);
        DB::table('goals')->insert([
            'name' => 'Cursos e atividades da sua área',
            'description' => 'Descreva aqui os cursos onde você participou que têm relação direta à sua função na empresa',
            'do_id' => '3',
            'do_type' => 'App\Office',
        ]);
        DB::table('goals')->insert([
            'name' => 'Ideias e/ou inovações tecnológicas',
            'description' => 'Apresente para nós uma idéia e/ou inovação (dispositivo) interessante em nossa área',
            'do_id' => '3',
            'do_type' => 'App\Office',
        ]);
    }
}
