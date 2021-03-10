<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $roles = [

        ['name'=>'super-admin','guard_name'=>'admin'],
        ['name'=>'human-resource','guard_name'=>'admin'],

    ];

    public function run()
    {
        foreach ($this->roles as $index => $role) {
            $result = Role::create($role);
            if (!$result) {
                $this->command->info("Insert failed at role $index.");
                return;
            }
        }
        $this->command->info('Inserted ' . count($this->roles) . ' roles');
    }
}
