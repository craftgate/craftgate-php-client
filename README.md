# Craftgate PHP Client

[![Build Status](https://github.com/craftgate/craftgate-php-client/workflows/Build%20Craftgate%20PHP%20Client/badge.svg?branch=master)](https://github.com/craftgate/craftgate-php-client/actions)

This repo contains the PHP client for Craftgate API.

## Requirements
- PHP 5.3 and later.

## Dependencies
The following PHP extensions are required:
* curl
* json

## Installation
### Composer
Download [Composer](https://getcomposer.org/download/) and run the following command under your project.
```bash
composer require craftgate/craftgate
```

### Manual Installation
You need to download the latest [release](https://github.com/craftgate/craftgate-php-client/releases) and copy to your project. Then, include the bootstrap file as shown below. This file will autoload all the class files into your project.

```php
require_once('/path/to/craftgate-php-client/CraftgateBootstrap.php');
```

## Usage
To access the Craftgate API you'll first need to obtain API credentials (e.g. an API key and a secret key). If you don't already have a Craftgate account, you can signup at [https://craftgate.io/](https://craftgate.io)

Once you've obtained your API credentials, you can start using Craftgate by instantiating a `Craftgate` with your credentials.

```php

$options = new RequestOptions();
$options->setApiKey('<YOUR API KEY>');
$options->setSecretKey('<YOUR SECRET KEY>');

$craftgate = new Craftgate($options);
...

```

By default the Craftgate client connects to the production API servers at `https://api.craftgate.io`. For testing purposes, please use the sandbox URL `https://sandbox-api.craftgate.io` using the .

```php

$options = new RequestOptions();
$options->setApiKey('<YOUR API KEY>');
$options->setSecretKey('<YOUR SECRET KEY>');
$options->setBaseUrl('https://sandbox-api.craftgate.io');

$craftgate = new Craftgate($options);

```

## Examples
Included in the project are a number of examples that cover almost all use-cases. Refer to [the `samples/` folder](./samples)] for more info.

### Running the Examples
If you've cloned this repo on your development machine and wish to run the examples you can run an example with the command `./vendor/bin/phpunit`

### Credit Card Payment Use Case
Let's quickly review an example where we implement a credit card payment scenario.

> For more examples covering almost all use-cases, check out the [examples in the `samples/` folder](./samples)

```php
$options = new RequestOptions();
$options->setApiKey('<YOUR API KEY>');
$options->setSecretKey('<YOUR SECRET KEY>');
$options->setBaseUrl('https://sandbox-api.craftgate.io');

$craftgate = new Craftgate($options);

$request = array(
    'price' => 100,
    'paidPrice' => 100,
    'walletPrice' => 0,
    'installment' => 1,
    'currency' => \Craftgate\Model\Currency::TL,
    'paymentGroup' => \Craftgate\Model\PaymentGroup::LISTING_OR_SUBSCRIPTION,
    'conversationId' => '456d1297-908e-4bd6-a13b-4be31a6e47d5',
    'card' => array(
        'cardHolderName' => 'Haluk Demir',
        'cardNumber' => '5258640000000001',
        'expireYear' => '2044',
        'expireMonth' => '07',
        'cvc' => '000'
    ),
    'items' => array(
        array(
            'externalId' => uniqid(),
            'name' => 'Item 1',
            'price' => 30
        ),
        array(
            'externalId' => uniqid(),
            'name' => 'Item 2',
            'price' => 50
        ),
        array(
            'externalId' => uniqid(),
            'name' => 'Item 3',
            'price' => 20
        )
    )
);

$response = $craftgate->payment()->createPayment($request);

print_r($response);

```

### Advanced Usage: Adapters
In reality, the `Craftgate` class serves as a collection of adapters that integrates with different parts of the API. While the intended usage for most use-cases is to instantiate a `Craftgate` instance (as illustrated in the examples above) and use its adapter accessors (e.g. `payment()`), you can also manually import a certain adapter class and instantiate it.

**Note:** When instantiating an adapter, you can use the same options as you would when instantiating a `Craftgate`

For all adapters in the `Craftgate`, their purposes, accessors, as well as direct import paths, refer to the list below:

| Adapter Name | Purpose | Accessor |
|--------------|---------|----------|
| `InstallmentAdapter` | Retrieving per-installment pricing information based on installment count or BIN number | `installment()` |
| `OnboardingAdapter` | Conducting CRUD operations on buyers and sub merchants | `onboarding()` |
| `PaymentAdapter` | Conducting payments, retrieving payment information, managing stored cards | `payment()` |
| `WalletAdapter` | Managing remittance, retrieving wallet transactions | `wallet()` |

## License
MIT
