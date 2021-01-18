<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedback', function (Blueprint $table) {
            $table->id();
            $table->string('comment');//the project owner comment for the project worker
            $table->foreignId('project_id')->reference('id')->on('projects')->onUpdate('cascade')->onDelete('cascade');//project_id
            $table->foreignId('owner_id')->reference('id')->on('users')->onUpdate('cascade')->onDelete('cascade');//project_owner
            $table->foreignId('worker_id')->reference('id')->on('users')->onUpdate('cascade')->onDelete('cascade');//project_worker
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
        Schema::dropIfExists('feedback');
    }
}
