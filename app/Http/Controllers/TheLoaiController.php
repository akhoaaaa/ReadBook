<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\TheLoai;

class TheLoaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $viewtheloai = TheLoai::orderBy('id','DESC')->get();
        return view('admin.theloai.index')->with(compact('viewtheloai'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.theloai.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'tentheloai' => 'required|unique:theloai|max:255',
            'slug' => 'required',
            'kichhoat' => 'required',
        ],[
            'tentheloai.required' => 'Vui lòng điền tên thể loại',
            'slug.required' => 'Vui lòng điền slug thể loại',
            'tentheloai.unique' => 'Tên thể loại đã tồn tại',
        ]);
        $theloai = new TheLoai();
        $theloai->tentheloai = $data['tentheloai'];
        $theloai->slug = $data['slug'];
        $theloai->kichhoat = $data['kichhoat'];
        $get_image = $request->hinhanh;
        $path = 'public/uploads/images/';
        $get_name_image = $get_image->getClientOriginalName();
        $name_image = current(explode('.',$get_name_image));
        $new_image = $name_image.'-'.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        $get_image->move($path,$new_image);

        $theloai->hinhanh = $new_image;
        $theloai->save();


        return redirect()->back()->with('message','Thêm thể loại thành công');
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
        $viewtheloai = TheLoai::find($id);
        return view('admin.theloai.edit')->with(compact('viewtheloai'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'tentheloai' => 'required|max:255',
            'slug' => 'required',
            'kichhoat' => 'required',
        ],[
            'tentheloai.required' => 'Vui lòng điền tên thể loại',
            'slug.required' => 'Vui lòng điền slug thể loại',
        ]);
        $theloai = TheLoai::find($id);
        $theloai->tentheloai = $data['tentheloai'];
        $theloai->slug = $data['slug'];
        $theloai->kichhoat = $data['kichhoat'];
        $get_image = $request->hinhanh;
        if ($get_image){
            $path = 'public/uploads/images/'.$theloai->hinhanh;
            if (file_exists($path)){
                unlink($path);
            }

            $path = 'public/uploads/images/';

            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.'-'.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path,$new_image);
            $theloai->hinhanh = $new_image;
        }
        $theloai->save();
        return redirect()->back()->with('message','Sửa thể loại thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $theloai = TheLoai::find($id);
        $path = 'public/uploads/images/'.$theloai->hinhanh;
        if (file_exists($path)){
            unlink($path);
        }else{
            $theloai->delete();
        }
        $theloai->delete();
        return redirect()->back()->with('message','xóa thể loại thành công');
    }
}
