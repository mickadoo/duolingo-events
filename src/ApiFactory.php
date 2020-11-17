<?php
declare(strict_types=1);

namespace Mickadoo\DuolingoEvents;

use GuzzleHttp\Client;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class ApiFactory
{
    public static function getEventsApi(): EventsApi
    {
        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);

        return new EventsApi(new Client(), $serializer);
    }
}