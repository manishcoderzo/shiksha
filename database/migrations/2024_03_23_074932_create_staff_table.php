<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->foreignId('staffTypeId')->references('id')->on('staff_types')->onDelete('cascade');
            // $table->string('headmasterId');
            $table->foreignId('schoolId')->references('id')->on('schools')->onDelete('cascade');
            $table->string('name');
            $table->string('roll');
            $table->string('teacherId');
            $table->string('gender');
            $table->string('category');
            $table->string('aadharNo');
            $table->string('treNo')->nullable();
            $table->string('mainSupplementry')->nullable();
            $table->string('class');
            $table->string('subject');
            $table->string('uDiskCode');
            $table->enum('joined', [0, 1])->default(1)->nullable();
            $table->string('dateOfJoining')->nullable();
            $table->string('joiningTime')->nullable();
            $table->string('contactNo');
            $table->string('email');
            $table->string('photo')->nullable();
            $table->string('password');
            $table->string('CreaterId');
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
        Schema::dropIfExists('staff');
    }
}
