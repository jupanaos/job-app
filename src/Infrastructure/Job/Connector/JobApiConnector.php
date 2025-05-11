<?php

namespace App\Infrastructure\Job\Connector;

use App\Service\Authentication\AuthenticationService;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

final class JobApiConnector
{
    public const URI = 'https://api.francetravail.io/partenaire/offresdemploi/v2/offres/search';

    public const METHOD = 'GET';

    public function __construct(
        private HttpClientInterface $client,
        private AuthenticationService $authenticationService,
        private CacheInterface $cache
    )
    {}

    public function getJobs(): array
    {
        $queryParams = [
            'commune' => "35238,33063"
        ];

        $token = $this->authenticationService->getCachedToken($this->cache);

        $request = $this->client->request(self::METHOD, self::URI, [
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'Application/json'
            ],
            'query' => $queryParams
        ]);

        $contents = json_decode($request->getContent(), true);

        return $contents;
    }
}