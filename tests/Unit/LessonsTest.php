<?php

namespace Tests\Unit;

use App\Lesson;

use App\User;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Faker\Factory as Faker;

use Tests\Helpers\Factory;

class LessonsTest extends ApiTester
{

	use Factory;

	// improvements
	// good if new fields get added

	public function getStub()
	{
		return [
			'title' 	=> $this->fake->sentence(4),
			'body'  	=> $this->fake->paragraph(5),
			'some_bool' => $this->fake->boolean()
		];
	}

	/** @test */

	public function it_creates_a_new_lesson_given_valid_parameters()
	{

		$user = new User(array('name' => 'JohnDoe'));
		$this->be($user);

		$response = $this->call('POST', 'api/v1/lessons', $this->getStub());
		//$this->assertResponseStatus(201);
		$this->assertEquals(201, $response->getStatusCode());
	}

	/** @test */

	public function it_throws_a_422_if_a_new_lesson_request_fails_validation() 
	{

		$user = new User(array('name' => 'JohnDoe'));
		$this->be($user);

		$response = $this->call('POST', 'api/v1/lessons');

		$this->assertEquals(422, $response->getStatusCode());

	}

	/** @test */
    
	public function it_fetches_lessons()
	{
		
		//dd(get_class_methods($this->fake));

		// arrange
		$this->times(3)->make('App\Lesson', ['title' => 'HELLO WORLd']); // ->times(5)

		// dd(Lesson::all()->toArray());

		// act
		$response = $this->call('GET', '/api/v1/lessons');

		// assert
		$this->assertEquals(200, $response->getStatusCode());
		//$this->assertTrue(true);

	}

	/** @test */

	public function it_fetches_a_single_lesson() {
		
		$this->make('App\Lesson');

		// ->getContent()
		$lesson = $this->call('GET', 'api/v1/lessons/1');

		//dd(json_decode($lesson->getContent(), true));

		$this->assertEquals(200, $lesson->getStatusCode());

		//$this->assertObjectHasAttribute('title', $lesson->data);
		$this->assertObjectHasAttributes( json_decode($lesson->getContent())->data, 'body', 'active');

	}

	/** @test */

	public function it_404s_if_a_lesson_is_not_found()
	{
		$lesson_none = $this->call('GET', 'api/v1/lessons/x');
		$this->assertEquals(404, $lesson_none->getStatusCode());
	}

	$this->assertObjectHasAttributes($lesson_none, 'error');

	// don't use - too verbose
	// public function makeLesson($lessonFields = [])
	// {
	// 	$lesson = array_merge([
	// 		'title' 	=> $this->fake->sentence(4),
	// 		'body'  	=> $this->fake->paragraph(5),
	// 		'some_bool' => $this->fake->boolean()
	// 	], $lessonFields);

	// 	while($this->times--) Lesson::create($lesson);

	// 	// tinyint default value
	// }



}
