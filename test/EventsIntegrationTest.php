<?php
declare(strict_types=1);

namespace Test;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use Mickadoo\DuolingoEvents\ApiFactory;
use Mickadoo\DuolingoEvents\EventsApi;
use Mickadoo\DuolingoEvents\Model\Event;
use Mickadoo\DuolingoEvents\Normalizer\EventDenormalizer;
use Mickadoo\DuolingoEvents\Request\EventsRequest;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Serializer;

class EventsIntegrationTest extends TestCase
{
    public function testWillFetchEvents()
    {
        $api = $this->getApi();
        $events = $api->getEvents(new EventsRequest());

        $this->assertInstanceOf(Event::class, $events[0]);
    }

    public function testWillFetchSingleEventWithHost()
    {
        $api = $this->getApi();
        $event = $api->getEvent('ac10a8c7-e6e8-4acc-ac0d-5fd0274ab3df');
        $this->assertNotEmpty($event->getHosts());
    }

    public function testWillFetchOnlyCertainLanguages()
    {
        $api = $this->getApi();
        $request = new EventsRequest();
        $request->setLanguageCodes(['fr']);
        $results = $api->getEvents($request);
        foreach ($results as $result) {
            $this->assertContains('fr', $result->getLanguages());
        }
    }

    public function testDateWillBeSet()
    {
        $api = $this->getApiWithSampleResponse();
        $request = new EventsRequest();
        $results = $api->getEvents($request);
        foreach ($results as $result) {
            $this->assertNotNull($result->getEventStart());
        }
    }

    public function testAllPropertiesWillBeSet()
    {
        $api = $this->getApiWithSampleResponse();
        $request = new EventsRequest();
        $results = $api->getEvents($request);
        $event = $results[0];
        $this->assertEquals(100, $event->getAttendeeLimit());
        $this->assertEquals(['INTERMEDIATE', 'ADVANCED'], $event->getAttendeeProficiency());
        $this->assertStringStartsWith(' Learn French with', $event->getDescription());
        $this->assertEquals(60.0, $event->getDuration());
        $this->assertEquals('13ed271d-0448-4eb0-95bf-5cdd4a2980f1', $event->getEventId());
        $this->assertEquals([480768093], $event->getHostIds());
        $this->assertStringStartsWith('Please join our new', $event->getInstructionToJoin());
        $this->assertFalse($event->isHidden());
        $this->assertEquals(['fr'], $event->getLanguages());
        $this->assertEquals('https://us02web.zoom.us/j/3677257324', $event->getOnlineLink());
        $this->assertEquals('WEEKLY', $event->getRecurrencePattern());
        $this->assertEquals('2020-11-18T23:00:00', $event->getEventStart()->format('Y-m-d\TH:i:s'));
        $this->assertEquals('2020-11-18T18:00:00', $event->getEventStartLocalTime()->format('Y-m-d\TH:i:s'));
        $this->assertEquals(1, $event->getStatus());
        $this->assertEquals('America/New_York', $event->getTimezone());
        $this->assertEquals('Intermediate French', $event->getTitle());
    }

    public function testCostWillBeSet()
    {
        $api = $this->getApi();
        $event = $api->getEvent('aa475d56-618c-41a9-9bb8-0db52d6bc9d2');

        $this->assertEquals(600, $event->getPrice());
    }

    protected function getApiWithSampleResponse(): EventsApi
    {
        $serializer = new Serializer([new EventDenormalizer()], [new JsonEncoder()]);
        $response = new Response(200, [], file_get_contents(__DIR__ . '/data/sample.json'));
        $client = $this->createMock(Client::class);
        $client->method('get')->willReturn($response);

        return new EventsApi($client, $serializer);
    }

    protected function getApi(): EventsApi
    {
        return ApiFactory::getEventsApi();
    }
}