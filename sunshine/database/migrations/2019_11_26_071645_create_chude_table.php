<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChudeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chude', function (Blueprint $table) {
            $table->unsignedTinyInteger('cd_ma')->autoIncrement();
            $table->string('cd_ten',50);
            $table->timestamp('cd_taoMoi')->nullable();
            $table->timestamp('cd_capNhat')->nullable();
            $table->unsignedTinyInteger('cd_trangThai')->default('2');
            
            $table->unique(['cd_ma', 'cd_ten']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chude');
    }
}
