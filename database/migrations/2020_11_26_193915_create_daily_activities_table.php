<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_activities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('activity_id');
            $table->foreign('activity_id')->references('id')->on('activities')->onDelete('cascade');
            $table->unsignedBigInteger('grade_id');
            $table->foreign('grade_id')->references('id')->on('grades')->onDelete('cascade');
            $table->text('dailyActivityText')->nullable();
            $table->string('dailyActivityCheck')->nullable();
            $table->timestamps();
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daily_activities');
    }
}
