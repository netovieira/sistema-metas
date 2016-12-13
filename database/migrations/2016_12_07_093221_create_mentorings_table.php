<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMentoringsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mentorings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mentor_id', false, true)->nullable();
            $table->integer('mentee_id', false, true)->nullable();
            $table->string('subject', 120);
            $table->text('description');
            $table->date('when')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('mentor_id')
                ->references('id')->on('users')
                ->onDelete('set null');

            $table->foreign('mentee_id')
                ->references('id')->on('users')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mentorings');
    }
}
