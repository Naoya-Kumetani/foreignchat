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
            $table->unsignedBigInteger('member1_id');
            $table->unsignedBigInteger('member2_id');
            $table->timestamps();
            $table->foreign('member1_id')->references('id')->on('members');
            $table->foreign('member2_id')->references('id')->on('members');
        });

        Schema::create('chats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('member_id');
            $table->unsignedBigInteger('room_id');
            $table->text('body',1000);
            $table->string('file')->nullable();
            $table->timestamps();
            $table->foreign('member_id')->references('id')->on('members');
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
