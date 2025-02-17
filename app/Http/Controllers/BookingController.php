<?php
namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Services\BookingService;

class BookingController extends Controller
{
    protected $bookingService;

    public function __construct(BookingService $bookingService)
    {
        $this->bookingService = $bookingService;
    }
/**
 * @OA\Post(
 *     path="/bookings",
 *     operationId="createBooking",
 *     tags={"Bookings"},
 *     summary="Yangi bron yaratish",
 *     description="Avtomobil bron qilish uchun so‘rov yuboriladi.",
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"car_id", "user_id", "start_time", "end_time"},
 *             @OA\Property(property="car_id", type="integer", example=1),
 *             @OA\Property(property="user_id", type="integer", example=2),
 *             @OA\Property(property="start_time", type="string", format="date-time", example="2023-01-01T10:00:00Z"),
 *             @OA\Property(property="end_time", type="string", format="date-time", example="2023-01-01T12:00:00Z")
 *         )
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Bron yaratildi",
 *         @OA\JsonContent(ref="#/components/schemas/Booking")
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
            'car_id'      => 'required|exists:cars,id',
            'user_id'     => 'required|exists:users,id',
            'start_time'  => 'required|date',
            'end_time'    => 'required|date|after:start_time',
        ]);

        $booking = $this->bookingService->createBooking($validated);
        return response()->json($booking, 201);
    }
/**
 * @OA\Get(
 *     path="/cars/{id}/bookings",
 *     operationId="getBookingsForCar",
 *     tags={"Bookings"},
 *     summary="Muayyan avtomobil uchun bronlar ro'yxatini olish",
 *     description="Berilgan avtomobil ID bo‘yicha bronlar ro'yxatini qaytaradi.",
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="Avtomobil ID",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Muvaffaqiyatli bajarildi",
 *         @OA\JsonContent(
 *             type="array",
 *             @OA\Items(ref="#/components/schemas/Booking")
 *         )
 *     )
 * )
 */
    public function index($carId)
    {
        $bookings = Booking::where('car_id', $carId)->get();
        return response()->json($bookings, 200);
    }
/**
 * @OA\Delete(
 *     path="/bookings/{id}",
 *     operationId="deleteBooking",
 *     tags={"Bookings"},
 *     summary="Bronni o‘chirish",
 *     description="Berilgan bron ID bo‘yicha bronni o‘chirib tashlaydi.",
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="Bron ID",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Bron muvaffaqiyatli o‘chirildi",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Booking deleted")
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Bron topilmadi"
 *     )
 * )
 */
    public function destroy($id)
    {
        $this->bookingService->deleteBooking($id);
        return response()->json(['message' => 'Booking deleted'], 200);
    }
}
