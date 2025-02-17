<?php

namespace App\Http\Controllers;

abstract class Controller
{
    /**
     * @OA\Info(
     *     title="Avtomobillarni Bron Qilish Tizimi API",
     *     version="1.0.0",
     *     description="RESTful API for managing car bookings"
     * )
     *
     * @OA\Server(
     *     url="/api",
     *     description="API Server"
     * )
     *
     * @OA\Tag(
     *     name="Cars",
     *     description="Avtomobillar bilan bog'liq operatsiyalar"
     * )
     *
     * @OA\Tag(
     *     name="Bookings",
     *     description="Bron qilish bilan bog'liq operatsiyalar"
     * )
     */
}
