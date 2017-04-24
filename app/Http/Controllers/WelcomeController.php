<?php

namespace App\Http\Controllers;

// constructor injection - concrete or contract
use Illuminate\Contracts\Config\Repository;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{

	protected $config;

	public function __construct(Repository $config) {

		$this->config = $config;
	}

    public function test(Repository $config) {
 		
 		// constructor injection
 		return $this->config->get('database.default');

 		// method injection - concrete or contract
 		// good if constructor call is not required and one function 'specific'
 		return $config->get('database.default');

 		// facade
 		return Config::get('database.default');

 		// config helper function
 		return config('database.default'); // recommended and clean

    }
}
