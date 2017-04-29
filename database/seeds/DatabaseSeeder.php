<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
//use DB;

class DatabaseSeeder extends Seeder
{

	protected $toTruncate = ['users', 'lessons', 'tags', 'lesson_tag'];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->cleanDatabase();

    	Model::unguard();

        //$this->call(UsersTableSeeder::class);

        $this->call(LessonsTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(LessonTagTableSeeder::class);
    }

    public function cleanDatabase() {
        // DB::table('users')->truncate();
        // DB::table(with(new $table)->getTable())->truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        foreach($this->toTruncate as $table) {
            DB::table($table)->truncate();
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
