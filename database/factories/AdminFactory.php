<?php

namespace Database\Factories;

use App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Admin::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'nom' => 'Elmarzougui',
            'prenom' => 'Abdelghafour',
            'email' => 'abdelgha4or@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456789@'), // password
            'remember_token' => Str::random(10),
            'city_id' => 1
        ];
    }
    

}
