<?php

namespace App\Services;

use App\Factories\Client;
use App\Factories\Gif;


class Giphy {

	protected $client;

	public function __construct(Client $client)
	{
		$this->client = $client;
	}


	public function gif()
	{
		return new Gif($this->client);
	}

    /**
     *
     *
     *
     */
}
