<?php
declare(strict_types=1);

namespace Test;

use Mickadoo\DuolingoEvents\ApiFactory;
use Mickadoo\DuolingoEvents\EventsApi;
use Mickadoo\DuolingoEvents\Model\Event;
use Mickadoo\DuolingoEvents\Model\LanguageCodes;
use Mickadoo\DuolingoEvents\Request\EventRequest;
use PHPUnit\Framework\TestCase;

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
        $request->setLanguageCodes([LanguageCodes::FRENCH]);
        $results = $api->getEvents($request);
        $allLanguages = [];
        foreach ($results as $result) {
            $allLanguages = array_merge($allLanguages, $result->getLanguages());
        }
        $allLanguages = array_unique($allLanguages);

        $this->assertCount(1, $allLanguages);
        $this->assertEquals('fr', $allLanguages[0]);
    }

    protected function getApi(): EventsApi
    {
        return ApiFactory::getEventsApi();
    }
}