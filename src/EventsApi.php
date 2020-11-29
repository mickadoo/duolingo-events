<?php
declare(strict_types=1);

namespace Mickadoo\DuolingoEvents;

use GuzzleHttp\Client;
use Mickadoo\DuolingoEvents\Model\Event;
use Mickadoo\DuolingoEvents\Request\AbstractRequest;
use Mickadoo\DuolingoEvents\Request\EventRequest;
use Mickadoo\DuolingoEvents\Request\EventsRequest;
use Symfony\Component\Serializer\SerializerInterface;

class EventsApi
{
    private Client $client;
    private SerializerInterface $serializer;
    private string $baseUrl = 'https://events-login.duolingo.com/api/2/';

    public function __construct(Client $client, SerializerInterface $serializer)
    {
        $this->client = $client;
        $this->serializer = $serializer;
    }

    /**
     * @param EventsRequest $request
     * @return Event[]
     */
    public function getEvents(EventsRequest $request): array
    {
        return $this->getResultsForPaginatedRequest($request, Event::class);
    }

    protected function getResultsForPaginatedRequest(EventsRequest $request, string $modelClass): array
    {
        $resultsRaw = $this->fetchAllPaginatedResults($request);
        $results = [];
        foreach ($resultsRaw as $resultRaw) {
            $resultJson = json_encode($resultRaw);
            $results[] = $this->serializer->deserialize($resultJson, $modelClass, 'json');
        }

        return $results;
    }

    private function fetchAllPaginatedResults(AbstractRequest $request): array
    {
        $results = [];
        $uri = $this->baseUrl . $request->getPath() . '?' . http_build_query($request->getQueryParams());
        while (true) {
            $response = $this->client->get($uri);
            $responseData = json_decode($response->getBody()->getContents(), true);
            $nextUri = $responseData['next_link'];
            $results = array_merge($results, $responseData['results']);
            if (!$nextUri || $nextUri === $uri) {
                break;
            }
            $uri = $nextUri;
        }

        return $results;
    }

    public function getEvent(string $id): Event
    {
        $response = $this->fetchSingleResult(new EventRequest($id));
        /** @var Event $event */
        $event = $this->serializer->deserialize($response->getBody()->getContents(), Event::class, 'json');

        return $event;
    }

    private function fetchSingleResult(AbstractRequest $request)
    {
        $uri = $this->baseUrl . $request->getPath() . '?' . http_build_query($request->getQueryParams());

        return $this->client->get($uri);
    }

}