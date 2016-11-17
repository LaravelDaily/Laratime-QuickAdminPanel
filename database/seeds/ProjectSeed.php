<?php

use Illuminate\Database\Seeder;

class ProjectSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['name' => 'QuickAdminPanel'],
            ['name' => 'Project #1'],
            ['name' => 'Project #2'],
            ['name' => 'Laravel package #1'],
            ['name' => 'Freelance'],

        ];

        foreach ($items as $item) {
            \App\Project::create($item);
        }
    }
}
