<?php

namespace Craftgate;

use Craftgate\Adapter\InstallmentAdapter;
use Craftgate\Adapter\OnboardingAdapter;
use Craftgate\Adapter\PaymentAdapter;
use Craftgate\Adapter\WalletAdapter;

class Craftgate
{
    private $options;

    public function __construct($options)
    {
        $this->setOptions($options);
    }

    /** @var array|Craftgate\CraftgateOptions $options */
    public function setOptions($options)
    {
        if (is_array($options)) {
            $options = new CraftgateOptions($options);
        }

        if (!$options instanceof CraftgateOptions) {
            throw new \Exception(sprintf(
                'Argument $options must be either instance of %s or an array, %s given',
                'Craftgate\CraftgateOptions', gettype($options)
            ));
        }

        $this->options = $options;

        return $this;
    }

    /** @return Craftgate\CraftgateOptions */
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
}
