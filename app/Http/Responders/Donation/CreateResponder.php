<?php

namespace App\Http\Responders\Donation;

use BrightComponents\Responder\Responder;

class CreateResponder extends Responder
{
    /**
     * Send a response.
     *
     * @return mixed
     */
    public function respond()
    {
        return view('donations.create');
    }
}
