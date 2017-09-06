<?php

use Illuminate\Database\Seeder;
use App\Models\Plan;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $plan = new Plan();
        $plan->name = "Pythagorean Theorem";
        $plan->tek = "8.7";
        $plan->objective = "Students will be able to use the Pythagorean theorem in word problems";
        $plan->department = "Math";
        $plan->grade_level = "8";
        $plan->content = "a<sup>2</sup>+b<sup>2</sup>=c<sup>2</sup>";
        $plan->file_uploads = null;
        $plan->created_by = 2;
        // $plan->created_at = now();
        $plan->save();
    }
}
