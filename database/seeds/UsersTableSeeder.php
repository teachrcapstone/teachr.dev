<?php

use Illuminate\Database\Seeder;

use Faker\Factory;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for($i=0; $i<=10; $i++){
			$user = new User();
			$user->name = $faker->name;
			$user->email = $faker->safeEmail;
			$user->password = Hash::make(env('USER_PASSWORD'));
			$user->save();
		}

    }
}
