<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            RoleSeeder::class,
            CitySeeder::class,
            AdminSeeder::class,
            GroupSeeder::class,
            CategorySeeder::class
        ]);

        \App\Models\Lead::factory(30)->create();
        \App\Models\Product::factory(10)->create();
        /* \App\Models\Admin::factory()
            ->count(1)
            ->forCity([
                'name' => 'Casablanca',
                'slug' => 'Casablanca city'
            ])
            ->create();*/

    }
}
