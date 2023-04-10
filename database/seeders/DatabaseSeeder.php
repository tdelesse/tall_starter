<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $password = Hash::make('password!123');

        $users = \App\Models\User::factory()
            ->count(10)
            ->sequence(fn (Sequence $sequence) => [
                'name' => 'user' . $sequence->index,
                'email' => 'user' . $sequence->index . '@invent.test',
            ])
            ->state(['password' => $password])
            ->create();
    }
}
