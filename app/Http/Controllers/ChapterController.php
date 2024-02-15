<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chapter;
use App\Models\Truyen;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chapter = Chapter::with('truyen')->orderBy('id','DESC')->get();

        return view('admin.chapter.index')->with(compact('chapter'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $truyen = Truyen::orderBy('id','DESC')->get();
        return view('admin.chapter.create')->with('truyen',$truyen);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|unique:chapter|max:255'   ,
            'noidung' => 'required',
            'idtruyen' => 'required',
            'kichhoat' => 'required',
            'slug' => 'required',
        ],[
            'title.unique' => 'Tiêu đề đã tồn tại vui lòng điền tên khác',
            'title.required' => 'vui lòng điền tiêu đề',
            'noidung.required' => 'vui lòng điền nội dung',
            'slug.required' => 'vui lòng điền slug',
        ]);
        $chapter = new Chapter();
        $chapter->title = $data['title'];
        $chapter->noidung = $data['noidung'];
        $chapter->slug = $data['slug'];
        $chapter->idtruyen = $data['idtruyen'];
        $chapter->kichhoat = $data['kichhoat'];
        $chapter->save();

        return redirect()->back()->with('message','thêm chapter truyện thành công');
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
        $chapter = Chapter::find($id);
        $truyen = Truyen::orderBy('id','DESC')->get();
        return view('admin.chapter.edit')->with(compact(
            'truyen','chapter'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'title' => 'required|max:255'   ,
            'noidung' => 'required',
            'idtruyen' => 'required',
            'kichhoat' => 'required',
            'slug' => 'required',
        ],[
            'title.required' => 'vui lòng điền tiêu đề',
            'noidung.required' => 'vui lòng điền nội dung',
            'slug.required' => 'vui lòng điền slug',
        ]);
        $chapter =  Chapter::find($id);
        $chapter->title = $data['title'];
        $chapter->noidung = $data['noidung'];
        $chapter->slug = $data['slug'];
        $chapter->idtruyen = $data['idtruyen'];
        $chapter->kichhoat = $data['kichhoat'];
        $chapter->save();

        return redirect()->back()->with('message','sửa chapter truyện thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Chapter::find($id)->delete();
        return redirect()->back()->with('message','xóa chap thành công');
    }
}
