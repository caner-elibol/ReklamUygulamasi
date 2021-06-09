<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ReklamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Reklam::factory(50)->create();
    }
}
