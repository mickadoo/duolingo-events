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

class EventsIntegrationTest extends TestCase
{
    public function testWillFetchEvents()
    {
        $api = $this->getApi();
        $events = $api->getEvents(new EventRequest());

        $this->assertInstanceOf(Event::class, $events[0]);
    }

    public function testWillFetchOnlyCertainLanguages()
    {
        $api = $this->getApi();
        $request = new EventRequest();
        $request->setLanguageCodes(['fr']);
        $results = $api->getEvents($request);
        $allLanguages = [];
        foreach ($results as $result) {
            $allLanguages = array_merge($allLanguages, $result->getLanguages());
        }
        $allLanguages = array_unique($allLanguages);

        $this->assertCount(1, $allLanguages);
        $this->assertEquals('fr', $allLanguages[0]);
    }

    protected function getApi(): Duolingo
    {
        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);

        return new Duolingo(new Client(), $serializer);
    }
}