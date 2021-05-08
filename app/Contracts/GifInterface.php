<?php

namespace App\Contracts;


interface GifInterface {

	public function search($query, array $params = [ ]);

	public function get($id);


	public function getMultiple(array $ids);


	public function translate($query, array $params = [ ]);



	public function random(array $params = [ ]);



	public function trending(array $params = [ ]);
}
