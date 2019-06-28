<?php

use Illuminate\Database\Seeder;

class ProfessoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Professor::class, 5)->create();
    }
}
