<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
/**
 * @OA\Schema(
 *     schema="Booking",
 *     type="object",
 *     title="Booking",
 *     required={"car_id", "user_id", "start_time", "end_time"},
 *     @OA\Property(property="id", type="integer", readOnly=true, example=1),
 *     @OA\Property(property="car_id", type="integer", example=1),
 *     @OA\Property(property="user_id", type="integer", example=2),
 *     @OA\Property(property="start_time", type="string", format="date-time", example="2023-01-01T10:00:00Z"),
 *     @OA\Property(property="end_time", type="string", format="date-time", example="2023-01-01T12:00:00Z"),
 *     @OA\Property(property="created_at", type="string", format="date-time"),
 *     @OA\Property(property="updated_at", type="string", format="date-time")
 * )
 */
    protected $fillable = [
        'car_id',
        'user_id',
        'start_time',
        'end_time',
    ];
}