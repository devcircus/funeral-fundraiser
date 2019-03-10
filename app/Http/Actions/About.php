<?php

namespace App\Http\Actions;

use BrightComponents\Actions\Action;
use App\Http\Responders\AboutResponder;

class About extends Action
{
    /** @var \Http\Responders\AboutResponder */
    private $responder;

    /**
     * Construct a new About action.
     *
     * @param  \Http\Responders\AboutResponder  $responder
     */
    public function __construct(AboutResponder $responder)
    {
        $this->responder = $responder;
    }

    /**
     * Execute the action.
     */
    public function __invoke()
    {
        return $this->responder;
    }
}
