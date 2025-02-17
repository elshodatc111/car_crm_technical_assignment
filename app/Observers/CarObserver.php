<?php

namespace App\Observers;

use App\Models\Car;
use Illuminate\Support\Facades\Log;

class CarObserver
{
    public function created(Car $car)
    {
        Log::info('New car created: '.$car->id);
    }

    public function updated(Car $car)
    {
        Log::info('Car updated: '.$car->id);
    }
}