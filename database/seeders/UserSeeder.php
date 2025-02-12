<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $staffMembers = [
            [
                'name' => 'Izzat Fikri',
                'email' => 'izzatfikri@gmail.com',
                'password' => Hash::make('12345678'), // Default password
                'userCategory' => 'admin',
                'staff_number' => 'A001',
            ],
            [
                'name' => 'Hannah Zaki',
                'email' => 'hannah@uniten.edu.my',
                'password' => Hash::make('12345678'), // Default password
                'userCategory' => 'staff',
                'staff_number' => 'ST001',
            ],
            [
                'name' => 'Hazeem Luqman',
                'email' => 'zeem@uniten.edu.my',
                'password' => Hash::make('password'), // Default password
                'userCategory' => 'staff',
                'staff_number' => 'ST002',
            ],
            [
                'name' => 'Ahmad Irfan',
                'email' => 'irfan@uniten.edu.my',
                'password' => Hash::make('password'), // Default password
                'userCategory' => 'staff',
                'staff_number' => 'ST003',
            ],
        ];

        foreach ($staffMembers as $staff) {
            User::create($staff);
        }
    }
}
