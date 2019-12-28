<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuyenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quyen', function (Blueprint $table) {
            $table->unsignedTinyInteger('q_ma')->autoIncrement();
            $table->string('q_ten',30);
            $table->string('q_dienGiai',250);
            $table->timestamp('q_taoMoi')->nullable();
            $table->timestamp('q_capNhat')->nullable();
            $table->tinyInteger('q_trangThai')->default('2');
            
            
            $table->unique(['q_ten']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quyen');
    }
}
