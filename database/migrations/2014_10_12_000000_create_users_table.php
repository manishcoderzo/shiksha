<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('fname');
            $table->string('lname');
            $table->string('photo')->nullable();
            $table->enum('userType', [0, 1,2,3]);
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
             $table->enum('status', [0, 1])->default(1);
             $table->string('stateId')->nullable();
             $table->string('districtId')->nullable();
             $table->string('blockId')->nullable();
             $table->enum('perCreate', [0, 1])->nullable();
             $table->enum('perView', [0, 1])->nullable();
             $table->enum('perEdit', [0, 1])->nullable();
             $table->enum('PerDelete', [0, 1])->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
