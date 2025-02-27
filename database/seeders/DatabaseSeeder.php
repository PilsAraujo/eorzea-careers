<?php

namespace Database\Seeders;

use App\Models\Faction;
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

        $user = User::factory()->create([
            'name' => 'Tataru Taru',
            'email' => 'tataru@scions.com',
            'password'=> bcrypt('lalala'),
        ]);

        Faction::factory()->for($user)->create([
            'name' => 'Scions of the 7th Dawn',
            'logo' => "logos/scions.png"
        ]);

        $this->call(JobSeeder::class);
    }
}
