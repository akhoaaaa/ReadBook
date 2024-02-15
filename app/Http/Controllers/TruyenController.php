<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DanhMuc;
use App\Models\Truyen;
use App\Models\TheLoai;
use Carbon\Carbon;

class TruyenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $list_truyen = Truyen::with('danhmuc','theloai')->orderBy('id','DESC')->get();
        return view('admin.truyen.index')->with(compact('list_truyen'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $theloai = TheLoai::orderBy('id','DESC')->get();
        $danhmuc = DanhMuc::orderBy('id','DESC')->get();
        return view('admin.truyen.create')->with('danhmuc',$danhmuc)->with('theloai',$theloai);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
           'tentruyen' => 'required|unique:truyen|max:255'   ,
            'mota' => 'required',
            'tacgia' => 'required',
            'tags' => 'required',
            'iddanhmuc' => 'required',
            'theloai' => 'required',
            'kichhoat' => 'required',
            'hinhanh' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|Dimensions:min_width=100,min_height=100,max_width = 2000,max_height=2000',
            'slug_truyen' => 'required',
        ],[
            'tentruyen.unique' => 'truyện đã tồn tại vui lòng điền tên khác',
            'tentruyen.required' => 'vui lòng điền tên truyện',
            'tacgia.required' => 'vui lòng điền tên tác giả',
            'tags.required' => 'vui lòng điền tags',
            'iddanhmuc.required' => 'vui lòng chọn danh mục',
            'theloai.required' => 'vui lòng chọn thể loại',
            'mota.required' => 'vui lòng điền mô tả',
            'hinhanh.required' => 'vui lòng chọn hình ảnh',
            'slug_truyen.required' => 'vui lòng điền slug',
        ]);
        $theloaiIDs = $data['theloai'];
        $theloaiString = implode(',',$theloaiIDs);

        $truyen = new Truyen();
        $truyen->tentruyen = $data['tentruyen'];
        $truyen->mota = $data['mota'];
        $truyen->tacgia = $data['tacgia'];
        $truyen->tags = $data['tags'];
        $truyen->slug_truyen = $data['slug_truyen'];
        $truyen->iddanhmuc = $data['iddanhmuc'];
        $truyen->theloai = $theloaiString;
        $truyen->kichhoat = $data['kichhoat'];

        $truyen->created_at = Carbon::now('Asia/Ho_Chi_Minh');
        $get_image = $request->hinhanh;
        $path = 'public/uploads/images/';
        $get_name_image = $get_image->getClientOriginalName();
        $name_image = current(explode('.',$get_name_image));
        $new_image = $name_image.'-'.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        $get_image->move($path,$new_image);

        $truyen->hinhanh = $new_image;
        $truyen->save();

        return redirect()->back()->with('message','thêm truyện thành công');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $theloai = TheLoai::orderBy('id','DESC')->get();
        $truyen = Truyen::find($id);
        $danhmuc = DanhMuc::orderBy('id','DESC')->get();
        return view('admin.truyen.edit')->with(compact('truyen','danhmuc','theloai'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'tentruyen' => 'required|max:255'   ,
            'mota' => 'required',
            'tacgia' => 'required',
            'iddanhmuc' => 'required',
            'tags' => 'required',
            'theloai' => 'required',
            'kichhoat' => 'required',
            'slug_truyen' => 'required',
        ],[
            'tentruyen.unique' => 'truyện đã tồn tại vui lòng điền tên khác',
            'tentruyen.required' => 'vui lòng điền tên truyện',
            'mota.required' => 'vui lòng điền mô tả',
            'tacgia.required' => 'vui lòng điền tác giả',
            'iddanhmuc.required' => 'vui lòng chọn danh mục',
            'tags.required' => 'vui lòng điền tag',
            'theloai.required' => 'vui lòng chọn thể loại',
            'hinhanh.required' => 'vui lòng chọn hình ảnh',
            'slug_truyen.required' => 'vui lòng điền slug',
        ]);
        $theloaiIDs = $data['theloai'];
        $theloaiString = implode(',',$theloaiIDs);
        $truyen = Truyen::find($id);
        $truyen->tentruyen = $data['tentruyen'];
        $truyen->mota = $data['mota'];
        $truyen->tacgia = $data['tacgia'];
        $truyen->tags = $data['tags'];
        $truyen->slug_truyen = $data['slug_truyen'];
        $truyen->iddanhmuc = $data['iddanhmuc'];
        $truyen->theloai = $theloaiString;
        $truyen->kichhoat = $data['kichhoat'];
        $truyen->updated_at = Carbon::now('Asia/Ho_Chi_Minh');

        $get_image = $request->hinhanh;
        if ($get_image){
            $path = 'public/uploads/images/'.$truyen->hinhanh;
            if (file_exists($path)){
                unlink($path);
            }

            $path = 'public/uploads/images/';

            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.'-'.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path,$new_image);
            $truyen->hinhanh = $new_image;
        }

        $truyen->save();

        return redirect()->back()->with('message','cập nhật truyện thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $truyen = Truyen::find($id);
        $path = 'public/uploads/images/'.$truyen->hinhanh;
        if (file_exists($path)){
            unlink($path);
        }
        $truyen->delete();
        return redirect()->back()->with('message','xóa truyện thành công');
    }
}
