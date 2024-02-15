<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DanhMuc;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cates = DanhMuc::orderBy('id','DESC')->get();
        return view('admin.danhmuc.index')->with('cates',$cates);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.danhmuc.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
           'tendanhmuc' => 'required|unique:danhmuc|max:255',
           'slug' => 'required|unique:danhmuc|max:255',
           'mota'=> 'required|max:255',
           'kichhoat'=> 'required',
        ],[
            'tendanhmuc.unique' => 'Vui lòng điền tên danh mục khác, danh mục đã tồn tại',
            'slug.unique' => 'Slug đã tồn tại',
            'tendanhmuc.required' => 'Vui lòng điền tên danh mục',
            'mota.required' => 'vui lòng điền mô tả',
        ]);
        $danhmuc = new DanhMuc();
        $danhmuc->tendanhmuc = $data['tendanhmuc'];
        $danhmuc->slug = $data['slug'];
        $danhmuc->mota = $data['mota'];
        $danhmuc->kichhoat = $data['kichhoat'];
        $danhmuc->save();
        return redirect()->back()->with('message','thêm danh mục thành công');
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
    public function edit(string $id){
    $cates = DanhMuc::find($id);
    return view('admin.danhmuc.edit')->with('cates',$cates);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'tendanhmuc' => 'required|max:255',
            'slug' => 'required|max:255',
            'mota' => 'required|max:255',
            'kichhoat' => 'required'
        ],[
            'tendanhmuc.required' => 'Vui lòng điền tên danh mục',
            'slug.required' => 'Vui lòng điền slug',

            'mota.required' => 'vui lòng điền mô tả',
            ]);
        $danhmuc = DanhMuc::find($id);
        $danhmuc->update([
            'tendanhmuc'=>$data['tendanhmuc'],
            'slug'=>$data['slug'],
            'mota' => $data ['mota'],
            'kichhoat' => $data['kichhoat'],
        ]);
        return redirect()->back()->with('message','sửa danh mục thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cates = DanhMuc::find($id)->delete();
        return redirect()->back()->with('message','xóa danh mục thành công');
    }
}
