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
          $table->renameColumn('assets-sort', 'assets_sort');
          $table->renameColumn('1', 'flow_1');
          $table->renameColumn('2', 'flow_2');
          $table->renameColumn('3', 'flow_3');
          $table->renameColumn('4', 'flow_4');
          $table->renameColumn('5', 'flow_5');
          $table->renameColumn('6', 'flow_6');
          $table->renameColumn('7', 'flow_7');
          $table->renameColumn('8', 'flow_8');
          $table->renameColumn('9', 'flow_9');
          $table->renameColumn('10', 'flow_10');
          $table->renameColumn('11', 'flow_11');
          $table->renameColumn('12', 'flow_12');
          $table->renameColumn('13', 'flow_13');
          $table->renameColumn('14', 'flow_14');
          $table->renameColumn('15', 'flow_15');
          $table->renameColumn('16', 'flow_16');
          $table->renameColumn('17', 'flow_17');
          $table->renameColumn('18', 'flow_18');
          $table->renameColumn('19', 'flow_19');
          $table->renameColumn('20', 'flow_20');
          $table->renameColumn('21', 'flow_21');
          $table->renameColumn('22', 'flow_22');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('table', function (Blueprint $table) {
            //
        });
    }
};
