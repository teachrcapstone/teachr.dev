<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function(Blueprint $table)
        {

            $table->increments('id');
            $table->string('lesson_name');
            $table->string('tek');
            $table->string('objective');
            $table->string('department');
            $table->string('grade_level')->nullable();
            $table->text('lesson_content')->nullable();
            $table->string('file_uploads')->nullable();

            $table->integer('created_by')->unsigned();
            $table->foreign('created_by')->references('id')->on('users');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('plans');
    }
}



