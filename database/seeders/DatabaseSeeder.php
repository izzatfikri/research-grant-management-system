<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // Create 5 Academician Account
        $this->call(AcademicianSeeder::class);

        // Create 3 Staff and 1 Admin Account
        $this->call(UserSeeder::class);

        // Create 2 Grants
        $this->call(GrantSeeder::class);

        // Create 1 Milestone
        $this->call(MilestoneSeeder::class);

        /*User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);*/

       
           /* $users = [
                [
                    'name' => 'Zurilan',
                    'email' => 'Zurilan@gmail.com',
                    'password' => Hash::make('12345678'),
                    'userCategory' => 'admin',
                ],
                [
                    'name' => 'norhazilah',
                    'email' => 'norhazilah@gmail.com',
                    'password' => Hash::make('12345678'),
                    'userCategory' => 'admin',

                ],
                [
                    'name' => 'huda',
                    'email' => 'huda@gmail.com',
                    'password' => Hash::make('12345678'),
                    'userCategory' => 'staff',
                ],
            ];


            DB::table('users')->insert($users);*/


    }
}
