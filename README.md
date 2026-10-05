# Craftgate PHP Client

[![Build Status](https://github.com/craftgate/craftgate-php-client/actions/workflows/craftgate-build.yml/badge.svg?branch=master)](https://github.com/craftgate/craftgate-php-client/actions?query=branch%3Amaster)
[![Latest Stable Version](https://poser.pugx.org/craftgate/craftgate/v/stable.svg)](https://packagist.org/packages/craftgate/craftgate)
[![Total Downloads](https://poser.pugx.org/craftgate/craftgate/downloads.svg)](https://packagist.org/packages/craftgate/craftgate)
[![License](https://poser.pugx.org/craftgate/craftgate/license.svg)](https://packagist.org/packages/craftgate/craftgate)
[![Gitpod ready-to-code](https://img.shields.io/badge/Gitpod-ready--to--code-blue?logo=gitpod)](https://gitpod.io/#https://github.com/craftgate/craftgate-php-client)

This repo contains the PHP client for Craftgate API.

[![Open in Gitpod](https://gitpod.io/button/open-in-gitpod.svg)](https://gitpod.io/#https://github.com/craftgate/craftgate-php-client)

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
You need to download the latest [release](https://github.com/craftgate/craftgate-php-client/releases) and copy to your project. Then, include the autoload file as shown below. This file will autoload all related classes into your project on-demand.

```php
require '/path/to/craftgate-php-client/autoload.php';
```

## Usage
To access the Craftgate API you'll first need to obtain API credentials (e.g. an API key and a secret key). If you don't already have a Craftgate account, you can signup at [https://craftgate.io/](https://craftgate.io)

Once you've obtained your API credentials, you can start using Craftgate by instantiating a `Craftgate\Craftgate` with your credentials.

```php
$craftgate = new \Craftgate\Craftgate(array(
    'apiKey' => '<YOUR API KEY>',
    'secretKey' => '<YOUR SECRET KEY>',
));
```

By default the Craftgate client connects to the production API servers at `https://api.craftgate.io`. For testing purposes, please use the sandbox URL `https://sandbox-api.craftgate.io`.

```php
$craftgate = new \Craftgate\Craftgate(array(
    'apiKey' => '<YOUR API KEY>',
    'secretKey' => '<YOUR SECRET KEY>',
    'baseUrl' => 'https://sandbox-api.craftgate.io',
));
```

## Examples
Included in the project are a number of examples that cover almost all use-cases. Refer to [the `samples/` folder](./samples) for more info.

### Running the Examples
If you've cloned this repo on your development machine and wish to run the examples you can run an example with the command `./vendor/bin/phpunit`

### Credit Card Payment Use Case
Let's quickly review an example where we implement a credit card payment scenario.

> For more examples covering almost all use-cases, check out the [examples in the `samples/` folder](./samples)

```php
$craftgate = new \Craftgate\Craftgate(array(
    'apiKey' => '<YOUR API KEY>',
    'secretKey' => '<YOUR SECRET KEY>',
    'baseUrl' => 'https://sandbox-api.craftgate.io',
));

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
            'externalId' => \Craftgate\Util\Guid::generate(),
            'name' => 'Item 1',
            'price' => 30
        ),
        array(
            'externalId' => \Craftgate\Util\Guid::generate(),
            'name' => 'Item 2',
            'price' => 50
        ),
        array(
            'externalId' => \Craftgate\Util\Guid::generate(),
            'name' => 'Item 3',
            'price' => 20
        )
    )
);

$response = $craftgate->payment()->createPayment($request);

var_dump($response);
```

## Idempotency

Mutating operations accept an optional idempotency key. Add a `headerOptions` entry to the request with an `idempotencyKey` inside it and the client sends it as the `x-idempotency-key` header, so a request can be safely retried (e.g. after a timeout) without the operation being performed twice — the server returns the result of the first request when it sees a repeated key.

`headerOptions` is a reserved request key, accepted on any request:

```php
$response = $craftgate->payment()->createPayment(array(
    'price' => 100.0,
    'paidPrice' => 100.0,
    'currency' => Currency::TRY,
    'paymentGroup' => PaymentGroup::LISTING_OR_SUBSCRIPTION,
    'headerOptions' => array('idempotencyKey' => uniqid('', true)),
    // ... other fields
));
```

Operations whose parameters live in the URL path take a request array as well, so they can carry a key too:

```php
$craftgate->payment()->expireCheckoutPayment(array(
    'token' => '456d1297-908e-4bd6-a13b-4be31a6e47d5',
    'headerOptions' => array('idempotencyKey' => uniqid('', true))
));
```

> Use a fresh key per distinct operation, and reuse the same key when retrying that operation.

> The API honours the key on `POST`, `PATCH` and `DELETE` only. It is ignored on `PUT` endpoints, so retrying one of those is not de-duplicated.

`headerOptions` is sent as headers only — it is removed from the request before it is signed and sent, so it never reaches the request body, the query string, or the signature. Your array is left intact, so the same array can be passed again to retry.

### Contributions
For all contributions to this client please see the contribution guide [here](CONTRIBUTING.md). By participating in this project, you agree to abide by our [Code of Conduct](CODE_OF_CONDUCT.md).

## Security
If you discover a security vulnerability, please review our [Security Policy](SECURITY.md) for how to report it responsibly.

## License
This project is licensed under the Apache License, Version 2.0 — see the [LICENSE](LICENSE) and [NOTICE](NOTICE.md) files for details.
