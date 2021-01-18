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
            $table->string('name');
            $table->string('email')->unique();
            $table->text('user_image')->nullable();
            $table->string('address');
            $table->string('user_bio')->nullable();
            $table->integer('country_id');
            $table->integer('government_id');
            $table->integer('city_id');
            $table->integer('state_id');
            $table->enum('gender', ['male', 'female']);
            $table->string('phone')->unique();
            $table->bigInteger('national_id')->unique();
            $table->date('date_of_birth');
            $table->double('rating')->nullable();
            $table->tinyInteger('role');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->foreignId('jop_id')->reference('id')->on('jops')->onUpdate('cascade')->onDelete('restrict');
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
