<?php

namespace Craftgate;

use Craftgate\Options;
use Craftgate\Adapter\InstallmentAdapter;
use Craftgate\Adapter\OnboardingAdapter;
use Craftgate\Adapter\PaymentAdapter;
use Craftgate\Adapter\WalletAdapter;

class Craftgate
{
    public $options;

    public function __construct(Options $options)
    {
        $this->options = $options;
    }

    public function payment()
    {
        return new PaymentAdapter($this->options);
    }

    public function installment()
    {
        return new InstallmentAdapter($this->options);
    }

    public function onboarding()
    {
        return new OnboardingAdapter($this->options);
    }

    public function wallet()
    {
        return new WalletAdapter($this->options);
    }
}
