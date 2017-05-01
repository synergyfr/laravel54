<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Faker\Factory as Faker;

use Artisan;

// some abstract class, should never instantiate it on its own

abstract class ApiTester extends TestCase
{

	protected $fake;

	function __construct()
	{
		$this->fake = Faker::create();
		// a constraint violation might be due to a field not being in fillable
	}

	public function getJson($uri, $method = 'GET', $parameters=[])
	{
		return json_decode($this->call($method, $uri, $parameters)->getContent());

	}

	public function setUp() {

		parent::setUp();

		Artisan::call('migrate');
		//$this->app['artisan']->call('migrate');
	}

	public function assertObjectHasAttributes()
	{
		$args = func_get_args();
		$object = array_shift($args);
		//dd($args);

		foreach($args as $attribute) {
			$this->assertObjectHasAttribute($attribute, $object);
		}
	}

}
