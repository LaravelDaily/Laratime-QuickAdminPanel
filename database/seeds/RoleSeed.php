<?php

use Illuminate\Database\Seeder;

class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['title' => 'Administrator (can create other users)'],
            ['title' => 'Simple user'],
        ];

        foreach ($items as $item) {
            \App\Role::create($item);
        }
    }
}
