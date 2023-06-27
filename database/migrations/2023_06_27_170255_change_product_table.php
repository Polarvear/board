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
            $table->string('flow_1_email')->nullable();
            $table->string('flow_2_email')->nullable();
            $table->string('flow_3_email')->nullable();
            $table->string('flow_4_email')->nullable();
            $table->string('flow_5_email')->nullable();
            $table->string('flow_6_email')->nullable();
            $table->string('flow_7_email')->nullable();
            $table->string('flow_8_email')->nullable();
            $table->string('flow_9_email')->nullable();
            $table->string('flow_10_email')->nullable();
            $table->string('flow_11_email')->nullable();
            $table->string('flow_12_email')->nullable();
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
    }
};
