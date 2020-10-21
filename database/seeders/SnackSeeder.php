<?php

namespace Database\Seeders;

use App\Models\Snack;
use Database\Factories\SnackFactory;
use Illuminate\Database\Seeder;

class SnackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Snack::factory(10)->create();
    }
}
