@extends('backend.layouts.master')

@section('title')
Hiệu chỉnh loại sản phẩm
@endsection

@section('custom-css')
<!-- Các css dành cho thư viện bootstrap-fileinput -->
<link href="{{ asset('vendor/bootstrap-fileinput/css/fileinput.css') }}" media="all" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
<link href="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.css') }}" media="all" rel="stylesheet" type="text/css"/>
@endsection

@section('main-content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="post" action="{{ route('danhsachloai.update', ['id' => $l->l_ma]) }}">
    <input type="hidden" name="_method" value="PUT" />
    {{ csrf_field() }}
    <div class="form-group">
        <label for="l_ma">Loại sản phẩm</label>
        <input type="text" class="form-control" id="l_ma" name="l_ma" value="{{ $l->l_ma }}" readonly>

    </div>
    <div class="form-group">
        <label for="l_ten">Tên loại sản phẩm</label>
        <input type="text" class="form-control" id="l_ten" name="l_ten" value="{{ old('l_ten', $l->l_ten) }}">
    </div>
    
    <div class="form-group">
        <label for="l_ngaytaoMoi">Ngày tạo mới</label>
        <input type="text" class="form-control" id="l_ngaytaoMoi" name="l_ngaytaoMoi" value="{{ old('l_ngaytaoMoi', $l->l_ngaytaoMoi) }}" data-mask-datetime>
    </div>
    <div class="form-group">
        <label for="l_ngaycapNhat">Ngày cập nhật</label>
        <input type="text" class="form-control" id="l_ngaycapNhat" name="sp_capNhat" value="{{ old('l_ngaycapNhat', $l->l_ngaycapNhat) }}" data-mask-datetime>
    </div>
    <select name="l_trangThai">
        <option value="1" {{ old('l_trangThai', $l->l_trangThai) == 1 ? "selected" : "" }}>Khoa</option>
        <option value="2" {{ old('l_trangThai', $l->l_trangThai) == 2 ? "selected" : "" }}>Kha dung</option>
    </select>

    <button type="submit" class="btn btn-primary">Lưu</button>
</form>
@endsection

@section('custom-scripts')
<!-- Các script dành cho thư viện bootstrap-fileinput -->
<script src="{{ asset('vendor/bootstrap-fileinput/js/plugins/sortable.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/js/fileinput.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/js/locales/fr.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/themes/fas/theme.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.js') }}" type="text/javascript"></script>


<!-- Các script dành cho thư viện Mặt nạ nhập liệu InputMask -->
<script src="{{ asset('theme/adminlte/plugins/input-mask/jquery.inputmask.js') }}"></script>
<script src="{{ asset('theme/adminlte/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
<script src="{{ asset('theme/adminlte/plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>

<script>
$(document).ready(function(){
    
});
</script>

@endsection