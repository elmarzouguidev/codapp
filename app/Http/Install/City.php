<?php

namespace App\Http\Install;

use App\Models\City as modelCity;

class City
{
    protected $cities = [

        ['name' => 'casablanca', 'slug' => 'casablanca'],
        ['name' => 'rabat', 'slug' => 'rabat'],
        ['name' => 'tanger', 'slug' => 'tanger'],
        ['name' => 'marrakech', 'slug' => 'marrakech'],

    ];

    public function setup()
    {

        foreach ($this->cities as $index => $city) {
            $result = modelCity::create($city);
            if (!$result) {
                $this->command->info("Insert failed at citiy $index.");
                return;
            }
        }
    }


}
