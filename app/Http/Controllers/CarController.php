<?php

namespace App\Http\Controllers;

use App\Services\CarService;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCarRequest;

class CarController extends Controller
{
    protected $carService;

    public function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }

    public function index()
    {
        return response()->json($this->carService->getAllCars(), 200);
    }

    public function store(StoreCarRequest $request)
    {
        $car = $this->carService->createCar($request->validated());
        return response()->json($car, 201);
    }
}
