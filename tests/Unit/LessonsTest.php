<?php

namespace Tests\Unit;

use App\Lesson;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Faker\Factory as Faker;

class LessonsTest extends ApiTester
{

	/** @test */
    
	public function test_it_fetches_lessons()
	{
		
		//dd(get_class_methods($this->fake));

		// arrange
		$this->makeLesson(); // ->times(5)

		// act
		$response = $this->call('GET', '/api/v1/lessons');

		// assert
		$this->assertEquals(200, $response->getStatusCode());
		//$this->assertTrue(true);

	}

	public function test_it_fetches_a_single_lesson() {
		
		$this->makeLesson();

		// ->getContent()
		$lesson = $this->call('GET', 'api/v1/lessons/1');

		//dd(json_decode($lesson->getContent(), true));

		$this->assertEquals(200, $lesson->getStatusCode());

		//$this->assertObjectHasAttribute('title', $lesson->data);
		$this->assertObjectHasAttributes( json_decode($lesson->getContent())->data, 'body', 'active');

	}

	public function it_404s_if_a_lesson_is_not_found()
	{
		$this->call('GET', 'api/v1/lessons/x');
		$this->assertResponseStatus(404);
	}

	public function makeLesson($lessonFields = [])
	{
		$lesson = array_merge([
			'title' 	=> $this->fake->sentence(4),
			'body'  	=> $this->fake->paragraph(5),
			'some_bool' => $this->fake->boolean()
		], $lessonFields);

		while($this->times--) Lesson::create($lesson);

		// tinyint default value
	}

}
