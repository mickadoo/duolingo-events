<?php

declare(strict_types = 1);

namespace Mickadoo\Duolingo;

use GuzzleHttp\Client;
use Mickadoo\Duolingo\Model\Event;
use Mickadoo\Duolingo\Request\AbstractRequest;
use Mickadoo\Duolingo\Request\EventRequest;
use Symfony\Component\Serializer\SerializerInterface;
use function array_merge;
use function http_build_query;
use function json_decode;
use function json_encode;

class Duolingo
{
    private Client $client;
    private SerializerInterface $serializer;
    private string $baseUrl = 'https://events-login.duolingo.com/api/2/';

    public function __construct(Client $client, SerializerInterface $serializer)
    {
        $this->client = $client;
        $this->serializer = $serializer;
    }

    public function getEvents(EventRequest $request): array
    {
        return $this->getResultsForPaginatedRequest($request, Event::class);
    }

    protected function getResultsForPaginatedRequest(EventRequest $request, string $modelClass): array
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

}