<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mainmenu_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->string('headline');
            $table->longText('description');

            $table->smallInteger('count')->default(0);
            $table->smallInteger('headnews')->default(0);
            $table->json('picture');
            $table->string('journalist');

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
        Schema::dropIfExists('news');
    }
}
