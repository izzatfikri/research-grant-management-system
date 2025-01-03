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
                'name' => 'YUNUS BIN YUSOFF, ASSOC. PROF. TS. DR.',
                'staff_number' => 'LN001',
                'email' => 'yunusy@uniten.edu.my',
                'college' => 'College of Computing & Informatics (CCI)',
                'department' => 'Department of Computing (CCI)',
                'position' => 'Assoc Prof.',
            ],
            [
                'name' => 'AZLAN BIN YUSOF, MR',
                'staff_number' => 'LN002',
                'email' => 'azlany@uniten.edu.my',
                'college' => 'College of Computing & Informatics (CCI)',
                'department' => 'Department of Computing (CCI)',
                'position' => 'Senior Lecturer',
            ],
            [
                'name' => 'AZHANA AHMAD, TS. DR.',
                'staff_number' => 'LN003',
                'email' => 'azhana@uniten.edu.my',
                'college' => 'College of Computing & Informatics (CCI)',
                'department' => 'Department of Computing (CCI)',
                'position' => 'Senior Lecturer',
            ],
            [
                'name' => 'SUHAIMI BIN AB. RAHMAN, TS. DR.',
                'staff_number' => 'LN004',
                'email' => 'smie@uniten.edu.my',
                'college' => 'College of Computing & Informatics (CCI)',
                'department' => 'Department of Computing (CCI)',
                'position' => 'Senior Lecturer',
            ],
            [
                'name' => 'MARINA BTE MD. DIN, TS.',
                'staff_number' => 'LN005',
                'email' => 'marina@uniten.edu.my',
                'college' => 'College of Computing & Informatics (CCI)',
                'department' => 'Department of Computing (CCI)',
                'position' => 'Senior Lecturer',
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
