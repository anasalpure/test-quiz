<?php

namespace App\Providers;

use App\Factories\Client as ApiClient;
use App\Services\Giphy;
use Illuminate\Support\ServiceProvider;

class GiphyServiceProvider extends ServiceProvider {


	public function register()
	{
		$this->app->singleton('giphy', function ($app)
		{
			$config = $app['config']->get('giphy');

			$client = new ApiClient(
                $config['baseUrl'],
                $config['apiKey']
            );

			return new Giphy($client);
		});

		$this->app->alias('giphy', 'App\Services\Giphy');
	}

}
