<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UrlShort extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('url_short', function (Blueprint $table){
            $table->increments('id');
            $table->string('url');
            $table->string('short', 5);
            $table->timestamps();

            $table->engine = "InnoDB";


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Shema::dropIfExists('url_short');
    }
}
