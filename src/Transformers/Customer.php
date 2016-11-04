<?php

namespace BrianFaust\Paymill\Transformers;

use Carbon\Carbon;

class Customer extends Transformer
{
    public function __construct($response)
    {
        if (is_string($response)) {
            $this->id = $response;
        } else {
            foreach ($response as $key => $value) {
                if ($key === 'payment' && isset($response->payment)) {
                    $value = $this->payment($response->payment);
                }

                if ($key === 'subscription' && isset($response->subscription)) {
                    $value = $this->subscription($response->subscription);
                }

                if (in_array($key, ['created_at', 'updated_at'])) {
                    $value = Carbon::createFromTimestamp($value);
                }

                $this->$key = $value;
            }
        }
    }

    protected function payment($payments)
    {
        $results = [];
        foreach ($payments as $payment) {
            $results[] = $this->buildPayment($payment);
        }

        return $results;
    }

    protected function subscription($subscriptions)
    {
        $results = [];
        foreach ($subscriptions as $subscription) {
            $results[] = $this->buildSubscription($subscription);
        }

        return $results;
    }
}