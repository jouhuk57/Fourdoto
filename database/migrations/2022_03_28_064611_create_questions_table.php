<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->text('question_description');
            $table->string('question_image_path')->nullable();
            $table->text('answer_description');
            $table->string('answer_image_path')->nullable();
            $table->string('video_attachement_link')->nullable();
            $table->integer('no_of_choices');
            $table->bigInteger('department_id')->unsigned()->nullable();
            $table->bigInteger('sub_department_id')->unsigned()->nullable();
            $table->bigInteger('access_level_id')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->foreign('sub_department_id')->references('id')->on('sub_departments')->onDelete('cascade');
            $table->foreign('access_level_id')->references('id')->on('access_levels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
