{{-- View này sẽ kế thừa giao diện từ `backend.layouts.master` --}}
    @extends('backend.layouts.master')
    {{-- Thay thế nội dung vào Placeholder `title` của view `backend.layouts.master` --}}

    @section('title')
    Danh sách loại sản phẩm
    @endsection
    
    {{-- Thay thế nội dung vào Placeholder `main-content` của view `backend.layouts.master` --}}
    @section('main-content')
    
    <br>
    <a href="{{ route('danhsachloai.print') }}" class="btn btn-warning">In ấn</a>
    
    <a href="{{ route('danhsachloai.excel') }}" class="btn btn-success">Xuất Excel</a>
    
<br><br>
    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
          @if(Session::has('alert-' . $msg))
          <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
          @endif
        @endforeach
    </div>
    <!-- Tạo nút Thêm mới sản phẩm 
    - Theo quy ước, các route đã được đăng ký trong file `web.php` đều phải được đặt tên để dễ dàng bảo trì code sau này.
    - Đường dẫn URL là đường dẫn được tạo ra bằng route có tên `danhsachsanpham.create`
    - Sẽ có dạng http://tenmiencuaban.com/admin/danhsachsanpham/create
    -->
    <a href="{{ route('danhsachloai.create') }}" class="btn btn-outline-primary">Thêm mới loại sản phẩm</a>
    <br><br>
    <!-- Tạo table hiển thị danh sách các sản phẩm -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Mã</th>
                <th>Tên</th>
                <th>Ngày tạo mới</th>
                <th>Ngày cập nhật</th>
                <th>Trạng thái</th>
                <th>Sửa-Xóa</th>
            </tr>
        </thead>
        <tbody>
            <!-- Sử dụng vòng lặp foreach để duyệt qua các sản phẩm 
            - Biến $danhsachsanpham là biến được truyền qua từ action `index()` trong controller SanPhamController.
            -->
            @foreach($danhsachloai as $l)
                <tr>
                    <td>{{ $l->l_ma }}</td>
                    <td>{{ $l->l_ten }}</td>
                    <td>{{ $l->l_ngaytaoMoi }}</td>
                    <td>{{ $l->l_ngaycapNhat }}</td>
                    @if($l->l_trangThai == 1 )
                        <td>Khóa</td>
                    @else
                        <td>Khả dụng</td>
                    @endif
                       <td>
                        <a href="{{ route('danhsachloai.edit', ['id' => $l->l_ma]) }}" class="btn btn-primary pull-left">Sửa</a>
                        <!-- Tạo nút Xóa sản phẩm 
                        - Theo quy ước, các route đã được đăng ký trong file `web.php` đều phải được đặt tên để dễ dàng bảo trì code sau này.
                        - Đường dẫn URL là đường dẫn được tạo ra bằng route có tên `danhsachsanpham.destroy`
                        - Route `danhsachsanpham.destroy` cần truyền vào 1 tham số {id}. Giá trị cần truyền là {id} của sản phẩm người dùng cần xóa.
                        - Các tham số cần truyền vào hàm route() là 1 array[]
                        - Sẽ có dạng http://tenmiencuaban.com/admin/danhsachsanpham/{id}
                        -->
                        <form method="post" action="{{ route('danhsachloai.destroy', ['id' => $l->l_ma]) }}" class="pull-left">
                            <!-- Khi gởi Request Xóa dữ liệu, Laravel Framework mặc định chỉ chấp nhận thực thi nếu có gởi kèm field `_method=DELETE` -->
                            <input type="hidden" name="_method" value="DELETE" />
                            <!-- Khi gởi bất kỳ Request POST, Laravel Framework mặc định cần có token để chống lỗi bảo mật CSRF 
                            - Bạn có thể tắt đi, nhưng lời khuyên là không nên tắt chế độ bảo mật CSRF đi.
                            - Thay vào đó, sử dụng hàm `csrf_field()` để tự sinh ra 1 input có token dành riêng cho CSRF
                            -->
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endsection