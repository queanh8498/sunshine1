<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChitietDonHang extends Model
{
    //
    public    $timestamps   = false;
    protected $table        = 'chitietdonhang';
    protected $fillable     = ['ctdh_soLuong', 'ctdh_donGia'];
    protected $guarded      = ['dh_ma', 'sp_ma', 'm_ma'];
    protected $primaryKey   = ['dh_ma', 'sp_ma', 'm_ma'];
    public    $incrementing = false;
}
