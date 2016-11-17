<?php

use Illuminate\Database\Seeder;

class WorkTypeSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['name' => 'Bug solving'],
            ['name' => 'New features'],
            ['name' => 'Support'],
            ['name' => 'Client management'],
            ['name' => 'Server maintenance'],
        ];

        foreach ($items as $item) {
            \App\WorkType::create($item);
        }
    }
}
