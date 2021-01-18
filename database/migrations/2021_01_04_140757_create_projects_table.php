<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');//the project name
            $table->string('description');//the project owner description
            $table->integer('duration_in_days');//the project owner wanted duration 
            $table->decimal('price',7);//the project owner price
            $table->boolean('is_compeleted')->default(0);//to check if the project is compeleted or not
            $table->string('address');//address of the project place
            $table->integer('government_id');//the project government
            $table->integer('city_id');//the project city
            $table->integer('district_id');//the project distract
            $table->foreignId('jop_id')->reference('id')->on('jops')->onUpdate('cascade')->onDelete('restrict');//required_job
            $table->foreignId('owner_id')->reference('id')->on('users')->onUpdate('cascade')->onDelete('restrict');//project_owner
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
        Schema::dropIfExists('projects');
    }
}
