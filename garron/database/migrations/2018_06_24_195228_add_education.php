<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEducation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('school')->nullable();
            $table->string('degree')->nullable();
            $table->string('field_of_study')->nullable();
            $table->string('grade')->nullable();
            $table->string('activities')->nullable();
            $table->date('from')->nullable();
            $table->date('to')->nullable();
            $table->string('description')->nullable();
            $table->enum('status',['enable', 'disable', 'deleted']);
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
        Schema::dropIfExists('education');
    }
}
