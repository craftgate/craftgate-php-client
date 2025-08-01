<?php

namespace Craftgate;

use Craftgate\Adapter\BankAccountTrackingAdapter;
use Craftgate\Adapter\BkmExpressPaymentAdapter;
use Craftgate\Adapter\FileReportingAdapter;
use Craftgate\Adapter\FraudAdapter;
use Craftgate\Adapter\HookAdapter;
use Craftgate\Adapter\InstallmentAdapter;
use Craftgate\Adapter\JuzdanPaymentAdapter;
use Craftgate\Adapter\MasterpassPaymentAdapter;
use Craftgate\Adapter\MerchantAdapter;
use Craftgate\Adapter\MerchantApmAdapter;
use Craftgate\Adapter\OnboardingAdapter;
use Craftgate\Adapter\PayByLinkAdapter;
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

    public function fileReporting()
    {
        return new FileReportingAdapter($this->options);
    }

    public function payByLink()
    {
        return new PayByLinkAdapter($this->options);
    }

    public function fraud()
    {
        return new FraudAdapter($this->options);
    }

    public function hook()
    {
        return new HookAdapter($this->options);
    }

    public function masterpass()
    {
        return new MasterpassPaymentAdapter($this->options);
    }

    public function bankAccountTracking()
    {
        return new BankAccountTrackingAdapter($this->options);
    }

    public function merchant()
    {
        return new MerchantAdapter($this->options);
    }

    public function merchantApm()
    {
        return new MerchantApmAdapter($this->options);
    }

    public function juzdan()
    {
        return new JuzdanPaymentAdapter($this->options);
    }

    public function bkmExpress()
    {
        return new BkmExpressPaymentAdapter($this->options);
    }
}
