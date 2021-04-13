<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStarFortuneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('star_fortune', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('star_id')->comment('關聯星座編號');
            $table->foreign('star_id')->references('id')->on('star');
            $table->date('date')->comment('運勢日期');
            $table->enum('type', ['total', 'love', 'work', 'money'])->comment('運勢類型');
            $table->integer('rate')->comment('運勢評分');
            $table->text('description')->comment('運勢說明');
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
        Schema::dropIfExists('star_fortune');
    }
}
