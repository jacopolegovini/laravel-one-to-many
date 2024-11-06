<?php

namespace Database\Seeders;

use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'title' => 'Guess the Pokemon',
                'author' => 'Jacopo',
                'date' => Carbon::now()->format('Y-m-d'),
                'description' => 'Gioco di indovinare il tipo del Pokemon a partire dal nome e dalla foto.'
            ],
            [
                'title' => 'Battleship',
                'author' => 'Jacopo',
                'date' => Carbon::parse('2024-11-20 15:00:00')->format('Y-m-d H:i:s'),
                'description' => 'Gioco di battaglia navale'
            ]
        ];

        foreach ($projects as $project) {
            // $newProject = new project();
            Project::create($project);
        }
    }
}
