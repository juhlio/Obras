<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Obra;

class ObrasSeeder extends Seeder
{
    public function run(): void
    {
        Obra::factory()->count(15)->create();
    }
}
