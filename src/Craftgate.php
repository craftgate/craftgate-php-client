<?php

namespace Craftgate;

use Craftgate\Adapter\InstallmentAdapter;
use Craftgate\Adapter\OnboardingAdapter;
use Craftgate\Adapter\PaymentAdapter;
use Craftgate\Adapter\WalletAdapter;

class Craftgate
{
    private $requestOptions;
    private $paymentAdapter;
    private $installmentAdapter;
    private $onboardingAdapter;
    private $walletAdapter;

    public function __construct($requestOptions)
    {
        $this->requestOptions = $requestOptions;
        $this->paymentAdapter = new PaymentAdapter($requestOptions);
        $this->installmentAdapter = new InstallmentAdapter($requestOptions);
        $this->onboardingAdapter = new OnboardingAdapter($requestOptions);
        $this->walletAdapter = new WalletAdapter($requestOptions);
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
