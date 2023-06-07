<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
          $table->string('type')->nullable();
          $table->string('assets-sort')->nullable();
          $table->text('level')->nullable();
          $table->text('advisor')->nullable();

          $table->text('1')->nullable();
          $table->text('2')->nullable();
          $table->text('3')->nullable();
          $table->text('4')->nullable();
          $table->text('5')->nullable();
          $table->text('6')->nullable();
          $table->text('7')->nullable();
          $table->text('8')->nullable();
          $table->text('9')->nullable();
          $table->text('10')->nullable();
          $table->text('11')->nullable();
          $table->text('12')->nullable();
          $table->text('13')->nullable();
          $table->text('14')->nullable();
          $table->text('15')->nullable();
          $table->text('16')->nullable();
          $table->text('17')->nullable();
          $table->text('18')->nullable();
          $table->text('19')->nullable();
          $table->text('20')->nullable();
          $table->text('21')->nullable();
          $table->text('22')->nullable();

          // 추가적인 컬럼들을 여기에 계속해서 추가합니다.
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
};
