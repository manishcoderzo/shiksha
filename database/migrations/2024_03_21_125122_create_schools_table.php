<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->foreignId('userId')->references('id')->on('users')->onDelete('cascade');
            $table->string('schoolName');
            $table->string('address');
            $table->string('state');
            $table->string('district');
            $table->string('block');
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            // $table->string('userId');
            $table->enum('status', [0, 1])->default(1);
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
        Schema::dropIfExists('schools');
    }
}
