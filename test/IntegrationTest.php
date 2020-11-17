<?php
declare(strict_types=1);

namespace Test;

use GuzzleHttp\Client;
use Mickadoo\Duolingo\Duolingo;
use Mickadoo\Duolingo\Model\Event;
use Mickadoo\Duolingo\Request\EventRequest;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class IntegrationTest extends TestCase
{
    public function testWillFetchEvents()
    {
        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);
        $api = new Duolingo(new Client(), $serializer);
        $events = $api->getEvents(new EventRequest());

        $this->assertInstanceOf(Event::class, $events[0]);
    }
}