<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->integer('telephoneNumber');
            $table->integer('dni');
            $table->string('address');
            $table->string('age');
            $table->string('email');
            $table->string('code')->rand();
            $table->date('birthDate');
            $table->string('fatherName');
            $table->integer('dniFather');
            $table->string('motherName');
            $table->integer('dniMother');
            $table->string('vaccinationCard')->nullable(true);
            $table->string('memorandumOfAssociation')->nullable(true);
            $table->string('status')->default('Activo');
            $table->string('imgUrl')->nullable(true);
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
        Schema::dropIfExists('students');
    }
}
