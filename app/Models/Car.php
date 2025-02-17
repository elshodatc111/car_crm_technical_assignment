<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
/**
 * @OA\Schema(
 *     schema="Car",
 *     type="object",
 *     title="Car",
 *     required={"name", "model", "number_plate"},
 *     @OA\Property(property="id", type="integer", readOnly=true, example=1),
 *     @OA\Property(property="name", type="string", example="Tesla"),
 *     @OA\Property(property="model", type="string", example="Model 3"),
 *     @OA\Property(property="number_plate", type="string", example="ABC123"),
 *     @OA\Property(property="description", type="string", example="Electric car"),
 *     @OA\Property(property="created_at", type="string", format="date-time"),
 *     @OA\Property(property="updated_at", type="string", format="date-time")
 * )
 */
    protected $fillable = [
        'name',
        'model',
        'number_plate',
        'description',
    ];
}