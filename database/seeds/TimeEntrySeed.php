<?php

use Illuminate\Database\Seeder;

class TimeEntrySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [

            ['id' => 1, 'project_id' => 1, 'work_type_id' => 2, 'start_time' => '2016-11-01 08:00:00', 'end_time' => '2016-11-01 11:30:00'],
            ['id' => 2, 'project_id' => 1, 'work_type_id' => 3, 'start_time' => '2016-11-01 01:14:00', 'end_time' => '2016-11-01 01:50:00']
        ];

        foreach ($items as $item) {
            \App\TimeEntry::create($item);
        }
    }
}
