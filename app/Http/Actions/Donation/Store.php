<?php

namespace App\Http\Actions\Donation;

use App\Models\Donation;
use Cartalyst\Stripe\Stripe;
use BrightComponents\Actions\Action;
use App\Http\Requests\DonationRequest;

class Store extends Action
{
    /** @var \Cartalyst\Stripe\Stripe */
    private $stripe;

    /** @var \App\Models\Donation */
    private $model;

    /**
     * Construct a new Donation Store action.
     *
     * @param  \Cartalyst\Stripe\Stripe  $stripe
     * @param  \App\Models\Donation  $model
     */
    public function __construct(Stripe $stripe, Donation $model)
    {
        $this->stripe = $stripe;
        $this->model = $model;
    }

    /**
     * Execute the action.
     */
    public function __invoke(DonationRequest $request)
    {
        $token = $request->token;

        try {
            if (! $token) {
                return response()->json(['error' => 'There was a problem with this transaction. Please try again.'], 401);
            }
            $charge = $this->stripe->charges()->create([
                'card' => $token,
                'currency' => 'USD',
                'amount'   => $request->amount/100,
                'description' => 'Martha Brown Donation',
            ]);
            $this->model->create([
                'name' => $request->name,
                'phone' => $request->phone,
                'amount' => $request->amount,
            ]);

            return response()->json(['success' => 'Thanks so much for your donation of $'.$request->amount/100], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }
}
