<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePost extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('Posts', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->text("body");
            $table->text("exerpt");
            $table->timestamp('published_at')->nullable();
            $table->foreignId("cat_id");
            $table->foreignId("user_id");
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
        //
        Schema::dropIfExists('Posts');
    }
}
