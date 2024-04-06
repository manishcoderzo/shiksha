<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaves', function (Blueprint $table) {
            $table->id();
            $table->foreignId('staffId')->references('id')->on('staff')->onDelete('cascade');
            $table->foreignId('headmasterId')->references('id')->on('headmasters')->onDelete('cascade');
            $table->foreignId('schoolId')->references('id')->on('schools')->onDelete('cascade');
             // $table->foreignId('attendanceId')->references('id')->on('attendances')->onDelete('cascade');
            $table->date('date');
            $table->string('reason')->nullable();
            $table->enum('leaveStatus', [0, 1,2])->default(0);
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
        Schema::dropIfExists('leaves');
    }
}
