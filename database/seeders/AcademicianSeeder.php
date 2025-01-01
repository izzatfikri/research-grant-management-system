<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Academician;

class AcademicianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $academicians = [
            [
                'name' => 'John Doe',
                'staff_number' => 'SN001',
                'email' => 'john.doe@example.com',
                'college' => 'College of Science',
                'department' => 'Physics',
                'position' => 'Professor',
            ],
        ];

        foreach ($academicians as $academician) {
            // Create a user entry
            $user = User::create([
                'name' => $academician['name'],
                'email' => $academician['email'],
                'password' => Hash::make('12345678'), // Default password
                'userCategory' => 'academician',
            ]);

            // Create an academician entry with the user_id
            Academician::create([
                'user_id' => $user->id,
                'name' => $academician['name'],
                'staff_number' => $academician['staff_number'],
                'email' => $academician['email'],
                'college' => $academician['college'],
                'department' => $academician['department'],
                'position' => $academician['position'],
            ]);
        }

    }
}
