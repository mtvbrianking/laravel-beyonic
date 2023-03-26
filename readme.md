## Laravel Beyonic Integration

[![Total Downloads](https://poser.pugx.org/bmatovu/laravel-beyonic/downloads)](https://packagist.org/packages/bmatovu/laravel-beyonic)
[![Latest Stable Version](https://poser.pugx.org/bmatovu/laravel-beyonic/v/stable)](https://packagist.org/packages/bmatovu/laravel-beyonic)
[![License](https://poser.pugx.org/bmatovu/laravel-beyonic/license)](https://packagist.org/packages/bmatovu/laravel-beyonic)
[![Code Quality](https://scrutinizer-ci.com/g/mtvbrianking/laravel-beyonic/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/mtvbrianking/laravel-beyonic/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/mtvbrianking/laravel-beyonic/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/mtvbrianking/laravel-beyonic/?branch=master)
[![Tests](https://github.com/mtvbrianking/laravel-beyonic/workflows/run-tests/badge.svg)](https://github.com/mtvbrianking/laravel-beyonic/actions?query=workflow:run-tests)
[![Documentation](https://github.com/mtvbrianking/laravel-beyonic/workflows/gen-docs/badge.svg)](https://mtvbrianking.github.io/laravel-beyonic/master)

### Introduction

This package helps you integrate the [Beyonic](https://developer.mfsafrica.com/docs/overview-5) into your Laravel application.

*Sign up and create your client application*
[Sandbox](https://app.beyonic.com)
[Live](https://payments.beyonic.com)

Menu --> Manage my account
Settings --> Organizations --> Users

### [Installation](https://packagist.org/packages/bmatovu/laravel-beyonic)

To get started, install the package via the Composer package manager:

```bash
composer require bmatovu/laravel-beyonic
```

**Configuration customization**

If you wish to customize the default configurations, you may export the default configuration using

```bash
php artisan vendor:publish --provider="Bmatovu\Beyonic\BeyonicServiceProvider" --tag="config"
```

Update the following settings in your environment file.

> .env

```diff
+ BEYONIC_API_URI=https://api.beyonic.com/api/
+ BEYONIC_API_TOKEN=...
+ BEYONIC_API_VERSION=v3
+ BEYONIC_CURRENCY=BXC
+ BEYONIC_SEND_INSTRUCTIONS=true
```

### Usage

```php
use Bmatovu\Beyonic\Services\Collection;

$collection = new Collection();

// Request a user to pay you
$apiTransactionResponse = $collection->ask('+80000000004', 500);
$transaction = json_decode($apiTransactionResponse);

// Get transaction details
$apiTransactionResponse = $collection->get($transaction->id);

// Get transactions
$apiTransactionsResponse = $collection->all();
```

### Reporting bugs

If you've stumbled across a bug, please help us by leaving as much information about the bug as possible, e.g.
- Steps to reproduce
- Expected result
- Actual result

This will help us to fix the bug as quickly as possible, and if you wish to fix it yourself feel free to [fork the package](https://github.com/mtvbrianking/laravel-beyonic) and submit a pull request!
