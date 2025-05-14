<?php

namespace App\Service\Authentication;

use RuntimeException;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\Cache\ItemInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

final class AuthenticationService
{
    public const URI = 'https://francetravail.io/connexion/oauth2/access_token?realm=/partenaire';

    public const METHOD = 'POST';

    public function __construct(
        private HttpClientInterface $client,
        private string $clientId,
        private string $clientSecret
    )
    {
    }

    public function fetchAccessToken(): string
    {
        $response = $this->client->request(self::METHOD, self::URI, [
            'headers' => [
                'Content-Type' => 'application/x-www-form-urlencoded',
            ],
            'body' => [
                'grant_type' => 'client_credentials',
                'client_id' => $this->clientId,
                'client_secret' => $this->clientSecret,
                'scope' => 'api_offresdemploiv2 o2dsoffre'
            ],
        ]);

        $data = $response->toArray();

        return $data['access_token'];
    }

    public function getCachedToken(CacheInterface $cache): string
    {
        return $cache->get('cached_token', function (ItemInterface $item) {
            $item->expiresAfter(1200);
            $accessToken = $this->fetchAccessToken();

            if (empty($accessToken)) {
                throw new RuntimeException('Impossible de récupérer le token');
            }

            return $accessToken;
        });
    }
}