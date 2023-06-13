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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('process')->nullable();
            $table->string('company')->nullable();
            $table->string('team')->nullable();
            $table->timestamp('receive_time')->nullable();
            $table->timestamp('start_time')->nullable();
            $table->string('work_status')->nullable();
            $table->timestamp('done_time')->nullable();
            $table->timestamp('request_time')->nullable();
            $table->string('checker')->nullable();
            $table->timestamp('confirm_done_time')->nullable();
            $table->string('modify_list')->nullable();
            $table->timestamp('modify_time')->nullable();
            $table->string('file_extension')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
};
