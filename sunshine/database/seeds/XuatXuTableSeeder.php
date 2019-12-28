<?php

use Illuminate\Database\Seeder;
use Illuminate\PhpVnDataGenerator\VnBase;
use Illuminate\PhpVnDataGenerator\VnFullname;
use Illuminate\PhpVnDataGenerator\VnPersonalInfo;

class XuatXuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = []; //create list chuwas data 
        $types = ["Sa Đéc", "Hậu Giang","Vĩnh Long","Đà Lạt","Sóc Trăng","Hà Nội"];

        sort($types); //sap xep theo a -> z

        for ($i=1; $i <= count($types); $i++) {
            $today = new DateTime();
            array_push($list, [     //array_push() trong PHP dùng để thêm một phần tử mới vào cuối mảng list
                'xx_ma'      => $i,
                'xx_ten'     => $types[$i-1],
                'xx_taoMoi'  => $today->format('Y-m-d H:i:s'),
                'xx_capNhat' => $today->format('Y-m-d H:i:s'),
            ]);
        }
        DB::table('xuatxu')->insert($list); //goi lenh insert
    }
}
