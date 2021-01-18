<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string('description');//the project worker description//the offer owner description
            $table->integer('duration_in_days');//the project worker wanted duration //the offer owner description
            $table->decimal('price',7);//the project worker wanted price//the offer owner wanted price
            $table->boolean('is_accepted')->default(0);//to check if the offer is accepted or not
            $table->foreignId('project_id')->reference('id')->on('projects')->onUpdate('cascade')->onDelete('cascade');//project_id
            $table->foreignId('worker_id')->reference('id')->on('users')->onUpdate('cascade')->onDelete('cascade');//offer_owner
            $table->timestamps();//Created_at & Updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offers');
    }
}
