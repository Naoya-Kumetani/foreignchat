<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('menber1_id');
            $table->unsignedBigInteger('menber2_id');
            $table->timestamps();
            $table->foreign('menber1_id')->references('id')->on('menbers');
            $table->foreign('menber2_id')->references('id')->on('menbers');
        });

        Schema::create('chats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('menber_id');
            $table->unsignedBigInteger('room_id');
            $table->text('body',1000);
            $table->timestamps();
            $table->foreign('menber_id')->references('id')->on('menbers');
            $table->foreign('room_id')->references('id')->on('rooms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chats');
        Schema::dropIfExists('rooms');
    }
}
