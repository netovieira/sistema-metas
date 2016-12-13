<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_items', function (Blueprint $table) {
            $table->increments('id');
            $table->text('response');
            $table->integer('report_id', false,true);
            $table->integer('goal_id', false, true)->nullable();
            $table->enum('rating', ['N', 'C', 'S']);
            $table->timestamps();

            $table->foreign('report_id')
                ->references('id')->on('reports');

            $table->foreign('goal_id')
                ->references('id')->on('goals')
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
        Schema::dropIfExists('report_items');
    }
}
