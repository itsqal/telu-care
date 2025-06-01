<?php

namespace Database\Seeders;

use App\Models\Facility;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Facility::factory(20)->create();
    }
}
