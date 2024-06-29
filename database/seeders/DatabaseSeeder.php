<?php

namespace Database\Seeders;

use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'admin@admin.com',
        ]);

        $bank = \App\Models\Bank::factory(4)->create();
        $bankBranch = \App\Models\BankBranch::factory(4)->create();
        $department = \App\Models\Department::factory(4)->create();


    }
}
