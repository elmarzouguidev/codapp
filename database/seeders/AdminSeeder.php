<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {

            $admin = Admin::create([

                'nom' => 'Elmarzougui',
                'prenom' => 'Abdelghafour',
                'email' => 'abdelgha4or@gmail.com',
                'email_verified_at' => now(),
                'password' => '123456789@', // password already hashed in the model see setPasswordAttribute()
                'remember_token' => Str::random(10),
                'city_id' => 1

            ]);

            if (!$admin) {
                $this->command->info("Insert failed at admin ");
                return;
            }
           $admin->assignRole(1);
           $this->command->info('Inserted  admin');
    }
}
