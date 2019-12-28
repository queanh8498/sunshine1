<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateXuatxuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('xuatxu', function (Blueprint $table) {
            $table->smallIncrements('xx_ma');
            $table->string('xx_ten', 100);
            $table->timestamp('xx_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('xx_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->tinyInteger('xx_trangThai')->default('2')->comment('1-khóa, 2-khả dụng');
            
            $table->unique(['xx_ten']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('xuatxu');
    }
}
