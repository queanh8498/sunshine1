<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loai extends Model
{
    const     CREATED_AT    = 'l_ngaytaoMoi';
    const     UPDATED_AT    = 'l_ngaycapNhat';
    protected $table        = 'loai';
    protected $fillable     = ['l_ten', 'l_ngaytaoMoi', 'l_ngaycapNhat', 'l_trangThai'];
    protected $guarded      = ['l_ma'];
    protected $primaryKey   = 'l_ma';
    protected $dates        = ['l_ngaytaoMoi', 'l_ngaycapNhat'];
    protected $dateFormat   = 'Y-m-d H:i:s';

    public function sanPhams() //mapping to table SanPham 
    {
        return $this->hasMany('App\SanPham', 'l_ma', 'l_ma');
    }
}
