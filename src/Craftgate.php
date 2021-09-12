<?php

namespace Craftgate;

use Craftgate\Adapter\InstallmentAdapter;
use Craftgate\Adapter\OnboardingAdapter;
use Craftgate\Adapter\PaymentAdapter;
use Craftgate\Adapter\PaymentReportingAdapter;
use Craftgate\Adapter\SettlementAdapter;
use Craftgate\Adapter\SettlementReportingAdapter;
use Craftgate\Adapter\WalletAdapter;

class Craftgate
{
    private $options;

    public function __construct($options)
    {
        $this->setOptions($options);
    }

    public function setOptions($options)
    {
        if (is_array($options)) {
            $options = new CraftgateOptions($options);
        }

        if (!$options instanceof CraftgateOptions) {
            throw new \InvalidArgumentException(sprintf(
                'Argument $options must be either instance of %s or an array, %s given',
                'Craftgate\CraftgateOptions', gettype($options)
            ));
        }

        $this->options = $options;

        return $this;
    }

    public function getOptions()
    {
        return $this->options;
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

    public function settlement()
    {
        return new SettlementAdapter($this->options);
    }

    public function settlementReporting()
    {
        return new SettlementReportingAdapter($this->options);
    }

    public function paymentReporting()
    {
        return new PaymentReportingAdapter($this->options);
    }
}
