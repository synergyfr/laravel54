<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
//use DB;

class DatabaseSeeder extends Seeder
{

	protected $toTruncate = ['users', 'lessons'];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	Model::unguard();

    	// DB::table('users')->truncate();
    	// DB::table(with(new $table)->getTable())->truncate();

    	foreach($this->toTruncate as $table) {
    		DB::table($table)->truncate();
    	}

        //$this->call(UsersTableSeeder::class);

        $this->call(LessonsTableSeeder::class);
    }
}
