<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Car;

class CarTest extends TestCase
{
    use RefreshDatabase;
    public function test_can_create_car()
    {
        $response = $this->postJson('/api/cars', [
            'name' => 'Tesla',
            'model' => 'Model 3',
            'number_plate' => 'ABC123',
            'description' => 'Electric car',
        ]);
        $response->assertStatus(201);
        $this->assertDatabaseHas('cars', [
            'name' => 'Tesla',
            'model' => 'Model 3',
            'number_plate' => 'ABC123',
        ]);
    }

    public function test_can_get_cars_list()
    {
        Car::factory()->create([
            'name' => 'Chevrolet',
            'model' => 'Malibu',
            'number_plate' => 'UZB001',
        ]);

        $response = $this->getJson('/api/cars');
        $response->assertStatus(200);
        $response->assertJsonFragment([
            'name' => 'Chevrolet',
            'model' => 'Malibu',
            'number_plate' => 'UZB001',
        ]);
    }
}
