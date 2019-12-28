<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\PhpVnDataGenerator\VnBase;
use Illuminate\PhpVnDataGenerator\VnFullname;
use Illuminate\PhpVnDataGenerator\VnPersonalInfo;

class SanPhamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('vi-VN'); //Faker cho phép Developer giả lập các dữ liệu mẫu
        $now = new Carbon('2019-11-28','Asia/Ho_Chi_Minh'); //Đây là một thư viên PHP giúp cho Developer làm việc với ngày giờ
        $uFN = new VnFullname();
        $uPI = new VnPersonalInfo();
        $photos=array('hoahong.jpg','hoalan.jpg','hoatuoi.jpg');
        $list=[];

        //lay ds loai san pham
        $dataLSP = DB::select('SELECT l_ma From loai');

        $lstLSP = [];

        foreach($dataLSP as $key => $value){
            $lstLSP[] = $value->l_ma;
        }

        for ($i =1; $i <=20; $i++){ //tao 20 dong du lieu
            $today = new DateTime();
            array_push($list,[
                'sp_ten' => $faker->text(100),
                'sp_giaGoc' => $faker->numberBetween(10000,1000000),
                'sp_giaBan' => $faker->numberBetween(10000,1000000),
                'sp_hinh' => "hoa-$i.jpg",
                'sp_thongTin' => $faker->paragraph(),
                'sp_danhGia' => $faker->text(100),
                'sp_taoMoi' => $today->format('Y-m-d H:i:s'),
                'sp_capNhat' => $today->format('Y-m-d H:i:s'),
                'sp_trangThai' => $faker->numberBetween(1,2),
                'l_ma' => $faker->randomElement($lstLSP)
            ]);
        }        
        DB::table('sanpham')->insert($list);
    }
}
