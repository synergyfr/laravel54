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

	// don't accept empty array
	protected function make($type, array $fields = [])
	{
		while ($this->times--)
		{
			$stub = array_merge($this->getStub(), $fields);
			$type::create($stub);
		}
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

	//abstract public function getStub();
	// we don't want the user to be forced to use this method if testing does not require
	// a make record 
	protected function getStub()
	{
		throw new BadMethodCallException('Create your own getStub method to declare your fields.');
	}

}
