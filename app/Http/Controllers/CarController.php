<?php
namespace App\Http\Controllers;

use App\Services\CarService;
use Illuminate\Http\Request;

class CarController extends Controller{
    protected $carService;

    public function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }
/**
 * @OA\Get(
 *     path="/cars",
 *     operationId="getCarsList",
 *     tags={"Cars"},
 *     summary="Avtomobillar ro'yxatini olish",
 *     description="Sistemadagi barcha avtomobillar ro'yxatini qaytaradi.",
 *     @OA\Response(
 *         response=200,
 *         description="Muvaffaqiyatli bajarildi",
 *         @OA\JsonContent(
 *             type="array",
 *             @OA\Items(ref="#/components/schemas/Car")
 *         )
 *     )
 * )
 */
    public function index()
    {
        return response()->json($this->carService->getAllCars(), 200);
    }
/**
 * @OA\Post(
 *     path="/cars",
 *     operationId="createCar",
 *     tags={"Cars"},
 *     summary="Yangi avtomobil qo‘shish",
 *     description="Yangi avtomobil yaratish uchun so‘rov yuboriladi.",
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"name", "model", "number_plate"},
 *             @OA\Property(property="name", type="string", example="Tesla"),
 *             @OA\Property(property="model", type="string", example="Model 3"),
 *             @OA\Property(property="number_plate", type="string", example="ABC123"),
 *             @OA\Property(property="description", type="string", example="Electric car")
 *         )
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Avtomobil yaratildi",
 *         @OA\JsonContent(ref="#/components/schemas/Car")
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Validatsiya xatosi"
 *     )
 * )
 */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'          => 'required|string',
            'model'         => 'required|string',
            'number_plate'  => 'required|string|unique:cars',
            'description'   => 'nullable|string',
        ]);

        $car = $this->carService->createCar($validated);
        return response()->json($car, 201);
    }
}
