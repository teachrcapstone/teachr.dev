<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Models\Post;
use App\User;

class PostsTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$faker = Faker\Factory::create();

		$categories = array('General', 'Elementary', 'Middle', 'High', 'Technology', 'Management', 'Administration', 'Other');

		for($i=0; $i<=50; $i++){
			$post = new Post();
			$post->title = $faker->catchPhrase();
			$post->content = $faker->bs;
			$post->category = array_rand($categories, 1);
			$post->created_by = User::all()->random()->id;
			$post->save();
		}
	}
}
