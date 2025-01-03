<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Grant;
use App\Models\Academician;

class GrantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $grants = [
            [
                'grant_amount' => 150000,
                'grant_provider' => 'Malaysian Ministry of Science, Technology and Innovation',
                'project_title' => 'Smart Agriculture Implementation',
                'project_description' => 'RThis project aims to implement smart farming techniques using IoT devices to enhance crop yield and reduce waste.',
                'start_date' => '2025-01-01',
                'end_date' => '2025-12-31',
                'duration' => 12,
            ],
            [
                'grant_amount' => 75000,
                'grant_provider' => 'Yayasan Khazanah',
                'project_title' => 'Community Health Awareness Campaign',
                'project_description' => 'A campaign designed to educate rural communities about health and wellness, focusing on preventive care and healthy living.',
                'start_date' => '2025-02-01',
                'end_date' => '2025-11-30',
                'duration' => 10,
            ],
            // Add more grants as needed
            [
                'grant_amount' => 200000,
                'grant_provider' => 'Malaysian Timber Industry Board',
                'project_title' => 'Sustainable Forestry Practices',
                'project_description' => 'This project seeks to develop sustainable practices in timber harvesting to preserve biodiversity and promote reforestation efforts.',
                'start_date' => '2025-02-01',
                'end_date' => '2025-12-30',
                'duration' => 11,
            ],
        ];

        foreach ($grants as $grantData) {
            // Create the grant
            $grant = Grant::create($grantData);

            // Assign a leader
            $leader = Academician::inRandomOrder()->first();
            if ($leader) {
                $grant->academicians()->attach($leader->id, ['role' => 'leader']);
            }

            // Assign members (e.g., 3 members)
            $members = Academician::inRandomOrder()->where('id', '!=', $leader->id)->take(2)->get();
            foreach ($members as $member) {
                $grant->academicians()->attach($member->id, ['role' => 'member']);
            }
        }
    }
}
