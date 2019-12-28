<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ChuDe;
use Session;
use Validator;

class ChuDeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ds_chude = ChuDe::all(); 

        return view('backend.chude.index')
        ->with('danhsachchude', $ds_chude);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {       
        $ds_chude = ChuDe::all(); 

        return view('backend.chude.create')
        ->with('danhsachchude', $ds_chude);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // var_dump();die;
        // print_r();die;
        // dd($request); //Dump and die
        // Kiểm tra ràng buộc dữ liệu (validation)
        $validator = Validator::make($request->all(), [
            'cd_ten' => 'required|min:3|max:50|unique:chude',
        ]);
        // Nếu kiểm tra ràng buộc dữ liệu thất bại -> tức là dữ liệu không hợp lệ
        // Chuyển hướng về view "Thêm mới" với,
        // - Thông báo lỗi vi phạm các quy luật.
        // - Dữ liệu cũ (người dùng đã nhập).
        if ($validator->fails()) {
            return redirect(route('danhsachchude.create'))
                        ->withErrors($validator)
                        ->withInput();
        }

        $cd = new ChuDe();
        $cd->cd_ten = $request->input('cd_ten');
        $cd->cd_taoMoi = $request->cd_taoMoi;
        $cd->cd_capNhat = $request->cd_capNhat;
        $cd->cd_trangThai = $request->cd_trangThai;
        $cd->cd_ma = $request->cd_ma;

        $cd->save();

        Session::flash('alert-warning', 'Thêm mới thành công ^^~!!!');
        return redirect()->route('danhsachchude.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
