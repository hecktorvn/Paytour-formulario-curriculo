<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ResumeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Resume::factory(10)->create();
    }
}
