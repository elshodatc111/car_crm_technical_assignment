<?php
namespace App\Services;

use App\Repositories\CarRepositoryInterface;

class CarService
{
    protected $carRepository;

    public function __construct(CarRepositoryInterface $carRepository)
    {
        $this->carRepository = $carRepository;
    }

    public function getAllCars()
    {
        return $this->carRepository->all();
    }

    public function createCar(array $data)
    {
        return $this->carRepository->create($data);
    }
}
