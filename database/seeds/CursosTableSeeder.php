<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Curso;

class CursosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        (new Curso(['nome' => 'Técnico em Informática']))->save();
        (new Curso(['nome' => 'Matemática']))->save();
    }
}
