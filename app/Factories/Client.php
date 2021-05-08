<?php namespace App\Factories;


use App\Contracts\ClientInterface;
use GuzzleHttp\Client as HttpClient;

class Client implements ClientInterface {


	protected $client;
	protected $defaults;


	public function __construct($baseUrl, $apiKey)
	{
        $this->defaults = [
			'api_key' => $apiKey
		];

        $this->client = new HttpClient([
			'base_uri' => $baseUrl,
		]);

	}


	public function get($endPoint, array $params = [ ])
	{
        $params['api_key'] = $this->defaults['api_key'];
		$response = $this->client->get($endPoint, [ 'query' => $params ]);

		switch ($response->getHeader('content-type'))
		{
			case "application/json":
				return $response->json();
				break;
			default:
				return $response->getBody()->getContents();
		}
	}
}
