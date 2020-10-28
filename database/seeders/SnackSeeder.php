<?php

namespace Database\Seeders;

use App\Models\Snack;
use Database\Factories\SnackFactory;
use Illuminate\Database\Seeder;

class SnackSeeder extends Seeder
{
    public function run()
    {
        Snack::factory(20)->create();
    }
}
