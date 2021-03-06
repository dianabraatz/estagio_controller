<?php

use Illuminate\Database\Seeder;
use App\Professor;

class ProfessoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Professor::class, 5)->create();
    }
}
