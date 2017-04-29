<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Faker\Factory as Faker;

use Artisan;

class ApiTester extends TestCase
{

	protected $fake;

	protected $times = 1;

	function __construct()
	{
		$this->fake = Faker::create();
		// a constraint violation might be due to a field not being in fillable
	}

	public function times($count)
	{
		$this->times = $count;

		// for chain
		return $this;
	}

	public function getJson($uri)
	{
		return json_decode($this->call('GET', $uri)->getContent());

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
