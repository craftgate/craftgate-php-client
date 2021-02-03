<?php

namespace Craftgate;

use Craftgate\ClientOptions;
use Craftgate\Adapter\InstallmentAdapter;
use Craftgate\Adapter\OnboardingAdapter;
use Craftgate\Adapter\PaymentAdapter;
use Craftgate\Adapter\WalletAdapter;

class Client
{
    private $options;

    public function __construct($options)
    {
        $this->setOptions($options);
    }

    /** @var array|Craftgate\ClientOptions $options */
    public function setOptions($options)
    {
        if (is_array($options)) {
            $options = new ClientOptions($options);
        }

        if (!$options instanceof ClientOptions) {
            throw new \Exception(sprintf(
                'Argument $options must be either instance of %s or an array, %s given',
                ClientOptions::class, gettype($options)
            ));
        }

        $this->options = $options;

        return $this;
    }

    /** @return Craftgate\ClientOptions */
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
