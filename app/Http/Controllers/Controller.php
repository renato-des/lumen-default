<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    // Overrides datetime object serialization
    protected function serializeDate(\DateTimeInterface $date)
    {
        $carbonInstance = \Carbon\Carbon::instance($date);

        return $this->isApiRequest() ? $carbonInstance->toISOString() : $carbonInstance->toDateTimeString();
    }
}
