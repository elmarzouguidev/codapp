<?php

namespace Tests\Feature\Models;

use Database\Seeders\CitySeeder;
use Database\Seeders\LeadSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ModelsSeederTest extends TestCase
{

    protected $seed = true;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(404);
    }

    /** @test */
    public function try_to_add_cities_via_seederTest()
    {
        $this->seed();
        //$this->seed(CitySeeder::class);
    }
    /** @test */
    public function try_to_add_leadsTest()
    {
        $this->seed();
      //  $this->seed(LeadSeeder::class);
    }
    /** @test */
    public function chek_if_a_city_name_existTest()
    {

        $this->assertDatabaseHas('cities', ['name' => 'casablanca']);
    }
}
