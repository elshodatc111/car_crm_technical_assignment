<?php
namespace App\Repositories;

use App\Models\Car;

class CarRepository implements CarRepositoryInterface
{
    public function all()
    {
        return Car::all();
    }

    public function create(array $data)
    {
        return Car::create($data);
    }
}