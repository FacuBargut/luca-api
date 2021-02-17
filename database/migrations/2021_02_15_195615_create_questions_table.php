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
            $table->string('title', 50)->nullable(false);
            $table->string('description', 255)->nullable(false);
            $table->bigInteger('id_student')->unsigned();
            $table->bigInteger('id_subject')->unsigned();
            $table->foreign('id_student')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('id_subject')->references('id')->on('subjects')->onDelete('cascade');
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
