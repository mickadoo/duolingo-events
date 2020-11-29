## Purpose

This package allows calling the Duolingo Events API.

![PHP Composer](https://github.com/mickadoo/duolingo-events/workflows/PHP%20Composer/badge.svg)

## Usage

First run `composer req mickadoo/duolingo-events` in your project.

To get an instance of the API wrapper use

```php
use Mickadoo\DuolingoEvents\ApiFactory;
use Mickadoo\DuolingoEvents\Request\EventRequest;

$api = ApiFactory::getEventsApi();
// Defaults to any language, events up to 3 days in future 
$events = $api->getEvents(new EventRequest());
```

Filter events by specifying language or time

```php
use Mickadoo\DuolingoEvents\ApiFactory;
use Mickadoo\DuolingoEvents\Request\EventRequest;

$api = ApiFactory::getEventsApi();
// Defaults to any language, events up to 3 days in future
$request = new EventRequest();
$request->setLanguageCodes(['fr']);
$request->setEndRange(new DateTime('+2 weeks'));
$events = $api->getEvents($request);
```

Each call will return an array of `Event` instances.

## Tests

To run the test suite clone this repository, run `composer install` and from the project directory run

```bash
vendor/bin/phpunit
```