<?php
declare(strict_types=1);

namespace Mickadoo\DuolingoEvents;

use GuzzleHttp\Client;
use Mickadoo\DuolingoEvents\Normalizer\EventDenormalizer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Serializer;

class ApiFactory
{
    public static function getEventsApi(): EventsApi
    {
        $serializer = new Serializer([new EventDenormalizer()], [new JsonEncoder()]);

        return new EventsApi(new Client(), $serializer);
    }
}