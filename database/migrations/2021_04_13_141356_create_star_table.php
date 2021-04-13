<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateStarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('star', function (Blueprint $table) {
            $table->id();
            $table->string('name', 20)->comment('星座名稱');
            $table->string('enName', 20)->comment('星座英文名稱');
            $table->timestamps();
        });
        DB::table('star')->insert([
            'name' => '牡羊座',
            'enName' => 'Aries',
        ]);
        DB::table('star')->insert([
            'name' => '金牛座',
            'enName' => 'Taurus',
        ]);
        DB::table('star')->insert([
            'name' => '雙子座',
            'enName' => 'Gemini',
        ]);
        DB::table('star')->insert([
            'name' => '巨蟹座',
            'enName' => 'Cancer',
        ]);
        DB::table('star')->insert([
            'name' => '獅子座',
            'enName' => 'Leo',
        ]);
        DB::table('star')->insert([
            'name' => '處女座',
            'enName' => 'Virgo',
        ]);
        DB::table('star')->insert([
            'name' => '天秤座',
            'enName' => 'Libra',
        ]);
        DB::table('star')->insert([
            'name' => '天蠍座',
            'enName' => 'Scorpio',
        ]);
        DB::table('star')->insert([
            'name' => '射手座',
            'enName' => 'Sagittarius',
        ]);
        DB::table('star')->insert([
            'name' => '摩羯座',
            'enName' => 'Capricorn',
        ]);
        DB::table('star')->insert([
            'name' => '水瓶座',
            'enName' => 'Aquarius',
        ]);
        DB::table('star')->insert([
            'name' => '雙魚座',
            'enName' => 'Pisces',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('star');
    }
}
