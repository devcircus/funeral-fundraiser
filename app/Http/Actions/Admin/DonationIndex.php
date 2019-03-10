<?php

namespace App\Http\Actions\Admin;

use BrightComponents\Actions\Action;
use App\Services\Admin\DonationIndexService;
use App\Http\Responders\Admin\DonationIndexResponder;

class DonationIndex extends Action
{
    /** @var /App\Http\Responders\Admin\DonationIndexResponder */
    private $responder;

    /**
     * Construct a new Admin Index action.
     *
     * @param  /App\Http\Responders\Admin\DonationIndexResponder  $responder
     */
    public function __construct(DonationIndexResponder $responder)
    {
        $this->responder = $responder;
    }

    /**
     * Execute the action.
     */
    public function __invoke()
    {
        return $this->responder->withPayload(DonationIndexService::call());
    }
}
