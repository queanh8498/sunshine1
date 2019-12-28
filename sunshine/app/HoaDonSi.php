<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoaDonSi extends Model
{
    //
    const     CREATED_AT    = 'hds_taoMoi';
    const     UPDATED_AT    = 'hds_capNhat';
    protected $table        = 'hoadonsi';
    protected $fillable     = ['hds_nguoiMuaHang', 'hds_tenDonVi', 'hds_diaChi', 'hds_maSoThue', 'hds_soTaiKhoan', 'nv_lapHoaDon', 'hds_ngayXuatHoaDon', 'nv_thuTruong', 'hds_taoMoi', 'hds_capNhat', 'hds_trangThai', 'dh_ma', 'tt_ma'];
    protected $guarded      = ['hds_ma'];
    protected $primaryKey   = 'hds_ma';
}
