<?php

namespace App\Factories;

use App\Contracts\GifInterface;

class Gif implements GifInterface {

	public function __construct(Client $client)
	{
		$this->client = $client;

	}


	public function search($query, array $params = [ ])
	{

		$params['q'] = $query;

		return $this->client->get("gifs/search", $params);
	}

	public function get($id)
	{
		return $this->client->get("gifs/$id");
	}

	public function getMultiple(array $ids)
	{
		$params = [ 'ids' => implode(",", $ids) ];

		return $this->client->get("gifs", $params);
	}


	public function translate($query, array $params = [ ])
	{
		$params['s'] = $query;

		return $this->client->get("gifs/translate", $params);
	}


	public function random(array $params = [ ])
	{
		return $this->client->get("gifs/random", $params);
	}


	public function trending(array $params = [ ])
	{
		return $this->client->get("gifs/trending", $params);
	}
}
