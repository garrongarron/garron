<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTablePositionLoader extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*Schema::table('position_loader', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('position');
            $table->string('when');
            $table->string('title');
            $table->longText('description');
            $table->string('type');
            $table->string('company_name');
            $table->string('industry');
            $table->longText('img');
            $table->timestamps();
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('position_loader');
    }
}
