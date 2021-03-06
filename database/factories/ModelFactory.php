<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */

// $factory->define(App\User::class, function (Faker\Generator $faker) {
//     static $password;

//     return [
//         'name' => $faker->name,
//         'email' => $faker->unique()->safeEmail,
//         'password' => $password ?: $password = bcrypt('secret'),
//         'remember_token' => str_random(10),
//     ];
// });

$factory->define(App\Lesson::class, function (Faker\Generator $faker) {
	return [
		'title'    	   => $faker->sentence(4), // can pass
		'body'  	   => $faker->paragraph(5), // Carbon now
		'some_bool'	   => $faker->boolean()
		//'published_at' => $faker->dateTime()
	];
});

$factory->define(App\Tag::class, function (Faker\Generator $faker) {
	return [
		'name'    	   => $faker->word,
	];
});

$factory->define(App\LessonTag::class, function (Faker\Generator $faker) {

	$lessonIds = App\Lesson::pluck('id')->toArray();
	$tagIds	   = App\Tag::pluck('id')->toArray();

	//DB::table('lesson_tag')->insert([

	//]);

	return [
		'lesson_id'    	   => $faker->randomElement($lessonIds),
		'tag_id'		   => $faker->randomElement($tagIds)
	];
});
