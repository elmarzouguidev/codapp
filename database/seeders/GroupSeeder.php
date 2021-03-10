<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

     protected $groups = [

        ['name' => 'group a', 'slug' => 'group-a'],
        ['name' => 'group b', 'slug' => 'group-b'],
        ['name' => 'group c', 'slug' => 'group-c'],
        ['name' => 'group d', 'slug' => 'group-d'],
        ['name' => 'group e', 'slug' => 'group-e'],

    ];

    public function run()
    {
        foreach ($this->groups as $index => $group) {
            $result = Group::create($group);
            if (!$result) {
                $this->command->info("Insert failed at group $index.");
                return;
            }
        }
        $this->command->info('Inserted ' . count($this->groups) . ' groups');
    }
}
