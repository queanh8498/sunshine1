<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChuDeSanPham extends Model
{
    //
    public    $timestamps   = false;
    protected $table        = 'chude_sanpham';
    protected $fillable     = [];
    protected $guarded      = ['sp_ma', 'cd_ma'];
    protected $primaryKey   = ['sp_ma', 'cd_ma'];
    public    $incrementing = false;
}
