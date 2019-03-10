<?php

namespace App\Http\Responders;

use BrightComponents\Responder\Responder;

class AboutResponder extends Responder
{
    /**
     * Send a response.
     *
     * @return mixed
     */
    public function respond()
    {
        return view('about');
    }
}
