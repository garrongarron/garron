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
        Schema::table('education', function (Blueprint $table) {
            $table->increments('id');
            $table->int('user_id');
            $table->string('school');
            $table->string('degree');
            $table->string('field_of_study');
            $table->string('activities');
            $table->date('from');
            $table->date('to');
            $table->string('description');
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
        Schema::table('education', function (Blueprint $table) {
            //
        });
    }
}
