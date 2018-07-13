# CqsExample
[![Build Status](https://travis-ci.com/lchrusciel/CqsExample.svg?token=cTZwsneSCKxJFLqtmGSW&branch=master)](https://travis-ci.com/lchrusciel/CqsExample)

Sample CQS application with multi context feature interpretation.

## What is inside?
* Behat
* PHPSpec
* PHPStan
* EasyCodingStandard
* Symfony (minimal version)
* Symfony Messenger

## Installation

```bash
composer install --prefer-dist
bin/console doctrine:schema:update --force
```

## Testing

```bash
source .test.env
composer validate --strict
composer analyse
composer test
```
