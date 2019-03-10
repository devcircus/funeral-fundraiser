<?php

namespace App\Http\Responders\Admin;

use BrightComponents\Responder\Responder;

class DonationIndexResponder extends Responder
{
    /**
     * Send a response.
     *
     * @return mixed
     */
    public function respond()
    {
        return view('admin.index', ['donations' => $this->payload->toArray()]);
    }
}
