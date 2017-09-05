<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->command->info('Deleting plans records');
        $this->command->info('Deleting users records');

        DB::table('plans')->delete();
        DB::table('users')->delete();

        $this->call(UsersTableSeeder::class);
        // $this->call(PlansTableSeeder::class);


        Model::reguard();
    }
}
