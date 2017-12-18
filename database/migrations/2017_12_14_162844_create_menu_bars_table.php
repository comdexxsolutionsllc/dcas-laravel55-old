<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuBarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_bars', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->nullable()->default(null)->unsigned();
            $table->integer('ordering')->unsigned();
            $table->string('title');
            $table->string('slug');
            $table->string('link');
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
        Schema::dropIfExists('menu_bars');
    }
}
