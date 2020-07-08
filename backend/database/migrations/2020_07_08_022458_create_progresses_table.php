<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('progresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            // 受付時間→reception_time
            // 受付対応者→reception_person
            // 氏名→name
            // 性別→gender
            // 企業→company
            // 医師確認→doctor_check
            $table->dateTime('reception_time', 0);
            $table->string('reception_person', 20);
            $table->string('name', 20);
            $table->boolean('gender');
            $table->string('company', 50)->nullable($value = true);
            $table->boolean('doctor_check');
            $table->boolean('nurse_check');

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
        Schema::dropIfExists('progresses');
    }
}
