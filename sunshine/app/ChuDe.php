<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChuDe extends Model
{
    public $timestamps = false;

    const CREATE_AT = 'cd_taoMoi';
    const UPDATED_AT = 'cd_capNhat';

    protected $table = 'chude';// model ánh xạ đến bảng chude
    protected $filltable = ['cd_ten', 'cd_taoMoi', 'cd_capNhat','cd_trangThai']; //gán dữ liệu tự động cào các cột này
    protected $guarded = ['cd_ma']; // ngăn việc thay đối nó

    protected $primaryKey = 'cd_ma'; 
    protected $dates = ['cd_taoMoi', 'cd_capNhat']; //thuộc lớp carbon, xử lí time
    protected $dateFormat ='Y-m-d H:i:s';
}
