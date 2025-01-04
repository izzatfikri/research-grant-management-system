<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Grant;
use App\Models\Milestone;


class MilestoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $milestonesData = [
            'Smart Agriculture Implementation' => [
                [
                    'milestone_title' => 'Initial Research',
                    'completion_date' => '2024-03-01',
                    'deliverable' => 'Research Report',
                    'status' => 'Completed',
                    'remarks' => 'Initial research completed successfully.',
                ],
                [
                    'milestone_title' => 'Prototype Development',
                    'completion_date' => '2024-06-01',
                    'deliverable' => 'Prototype',
                    'status' => 'Pending',
                    'remarks' => 'Prototype development is ongoing.',
                ],
                [
                    'milestone_title' => 'Field Testing',
                    'completion_date' => '2024-09-01',
                    'deliverable' => 'Field Test Report',
                    'status' => 'Pending',
                    'remarks' => 'Field testing scheduled for September.',
                ],
            ],
            'Sustainable Forestry Practices' => [
                [
                    'milestone_title' => 'Initial Research',
                    'completion_date' => '2025-05-01',
                    'deliverable' => 'Research Report',
                    'status' => 'Pending',
                    'remarks' => 'Initial research partially completed.',
                ],
            ],
        ];

        foreach ($milestonesData as $projectTitle => $milestones) {
            // Find the grant by project title
            $grant = Grant::where('project_title', $projectTitle)->first();

            if ($grant) {
                foreach ($milestones as $milestone) {
                    Milestone::create([
                        'grant_id' => $grant->id,
                        'milestone_title' => $milestone['milestone_title'],
                        'completion_date' => $milestone['completion_date'],
                        'deliverable' => $milestone['deliverable'],
                        'status' => $milestone['status'],
                        'remarks' => $milestone['remarks'],
                    ]);
                }
            }
        }
    }
}
