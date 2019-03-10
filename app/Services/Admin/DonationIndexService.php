<?php

namespace App\Services\Admin;

use App\Models\Donation;
use BrightComponents\Services\Traits\SelfCallingService;

class DonationIndexService
{
    use SelfCallingService;

    /** @var \App\Models\Donation */
    private $model;

    /**
     * Construct a new DonationIndexService.
     *
     * @param  \App\Models\Donation  $model
     */
    public function __construct(Donation $model)
    {
        $this->model = $model;
    }

    /**
     * Handle the call to the service.
     *
     * @return mixed
     */
    public function run()
    {
        return $this->model->latest()->get();
    }
}
