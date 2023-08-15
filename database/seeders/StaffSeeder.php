<?php

namespace Database\Seeders;

use App\Models\Staffs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Staffs::factory()->count('50')->create();
    }
}
