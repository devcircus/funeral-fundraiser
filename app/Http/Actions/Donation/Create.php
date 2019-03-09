<?php

namespace App\Http\Actions\Donation;

use Illuminate\Http\Request;
use BrightComponents\Actions\Action;
use App\Http\Responders\Donation\CreateResponder;

class Create extends Action
{
    /** @var \App\Http\Responders\Donation\CreateResponder */
    private $responder;

    /**
     * Construct a new Donation Create action.
     *
     * @param  \App\Http\Responders\Donation\CreateResponder  $responder
     */
    public function __construct(CreateResponder $responder)
    {
        $this->responder = $responder;
    }

    /**
     * Execute the action.
     */
    public function __invoke(Request $request)
    {
        return $this->responder;
    }
}
