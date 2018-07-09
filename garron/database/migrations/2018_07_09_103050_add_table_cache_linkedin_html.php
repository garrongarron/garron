<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTableCacheLinkedinHtml extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*Schema::table('cache_linkedin', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('url');
            $table->string('type');
            $table->longText('description');
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
        //Schema::dropIfExists('cache_linkedin');
    }
}
