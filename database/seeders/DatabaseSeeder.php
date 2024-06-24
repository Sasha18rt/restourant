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
         User::factory(100)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'admin@example.com',
'usertype'=>1,
'password'=>'$2y$10$X62YVq3aVGPEy0BRGat0a.qWXWeFyb0sPpu7O.jdnVOlTp1DuR.Ku',
        ]);
    }
}
