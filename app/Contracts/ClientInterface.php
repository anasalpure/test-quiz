<?php

namespace App\Contracts;

interface ClientInterface {

	public function get($endPoint, array $options = [ ]);

}
