<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Loai;
class ExampleController extends Controller
{
    public function hello()
    {
        $dataLoai = Loai::all();

        $hoten = '<script>alert("Hello js");</script>';
        $isAdmin = false;

        return view ('example.hello')->with('isAdmin',$isAdmin)->with('hotentrongview',$hoten)->with('dataLoai',$dataLoai);
        
        // // khi gọi hàm view(), có một số lưu ý: 
        // // - Mặc định thư mục gốc là `resources/views`
        // // - Từ thư mục gốc, việc phân cách thư mục sẽ sử dụng dấu .
        // // - Tên view không cần khai báo đuôi file (extension) `blade.php`
        
        // // => view được gọi hiển thị sẽ nằm trong thư mục `resources/views/example/hello.blade.php'
        // return view('example.hello');


    }
}
