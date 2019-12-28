<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MauSanPham extends Model
{
    //
    public    $timestamps   = false;
    protected $table        = 'mau_sanpham';
    protected $fillable     = ['msp_soluong'];
    protected $guarded      = ['sp_ma', 'm_ma'];
    protected $primaryKey   = ['sp_ma', 'm_ma'];
    public    $incrementing = false;
}
