<?php

namespace Craftgate;

use Craftgate\Options;
use Craftgate\Adapter\InstallmentAdapter;
use Craftgate\Adapter\OnboardingAdapter;
use Craftgate\Adapter\PaymentAdapter;
use Craftgate\Adapter\WalletAdapter;

class Craftgate
{
    private $options;
    private $paymentAdapter;
    private $installmentAdapter;
    private $onboardingAdapter;
    private $walletAdapter;

    public function __construct(Options $options)
    {
        $this->options            = $options;
        $this->paymentAdapter     = new PaymentAdapter($options);
        $this->installmentAdapter = new InstallmentAdapter($options);
        $this->onboardingAdapter  = new OnboardingAdapter($options);
        $this->walletAdapter      = new WalletAdapter($options);
    }

    public function payment()
    {
        return $this->paymentAdapter;
    }

    public function installment()
    {
        return $this->installmentAdapter;
    }

    public function onboarding()
    {
        return $this->onboardingAdapter;
    }

    public function wallet()
    {
        return $this->walletAdapter;
    }
}
