<!DOCTYPE html>
<html>

<head>
    <title>Danh sách sản phẩm</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style type="text/css">
        * {
            font-family: DejaVu Sans, sans-serif;
        }
    </style>
</head>

<body style="font-size: 13px" >
    <div class="row">
        <table border="0" align="center" cellpadding="10" style="border-collapse: collapse;">
            <tr>
                <td colspan="6" align="center" style="font-size: 13px;" style="width: 800px;>
                    <b>Công ty TNHH Sunshine</b></td>
            </tr>
            <tr>
                <td colspan="6" align="center" style="font-size: 13px">
                    <b>http://sunshine.com/</b></td>
            </tr>
            <tr>
                <td colspan="6" align="center" style="font-size: 13px">
                    <b>(0292)3.888.999 # 01.222.888.999</b></td>
            </tr>
            <tr>
                <td colspan="6" align="center" >
                     <img src= "{{ asset('storage/photos/hoa.png') }}"  width="150" height="150"/></td>  <!--"{{ asset('public/storage/photos/modern_mom.jpg') }}" -->
            </tr>
            <tr>
                <td colspan="6" class="caption" align="center"style="text-align: center; font-size: 20px;width: 631.783px;">
                    <b>Danh sách sản phẩm</b>
                </td>
            </tr>
            <tr style="border: 1px solid #000">
                <th style="text-align: center">STT</th>
                <th style="text-align: center">Hình sản phẩm</th>
                <th style="text-align: center">Tên sản phẩm</th>
                <th style="text-align: center">Giá gốc</th>
                <th style="text-align: center">Giá bán</th>
                <th style="text-align: center">Loại sản phẩm</th>
            </tr>
            @foreach ($danhsachsanpham as $sp)
            <tr style="border: 1px solid #000">
                <td align="center" valign="middle" width="5">
                    {{ $loop->index + 1 }}
                </td>
                <td align="center" valign="middle" width="40" height="110">
                    <img class="hinhSanPham" src="{{ asset('storage/photos/' . $sp->sp_hinh) }}" width="150" height="150" />
                </td>
                <td align="left" valign="middle" width="50">{{ $sp->sp_ten }}</td>
                <td align="right" valign="middle" width="40">{{ $sp->sp_giaGoc }}</td>
                <td align="right" valign="middle" width="40">{{ $sp->sp_giaBan }}</td>
                @foreach ($danhsachloai as $l)
                    @if ($sp->l_ma == $l->l_ma)
                    <td align="left" width="15" valign="middle">{{ $l->l_ten }}</td>
                    @endif
                @endforeach
            </tr>
            @endforeach
        </table>
    </div>
</body>

</html>