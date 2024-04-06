<?php

namespace App\Http\Controllers;

use App\Models\TheLoai;
use Illuminate\Http\Request;
use App\Models\DanhMuc;
use App\Models\Truyen;
use App\Models\Chapter;
use Illuminate\Support\Carbon;

class IndexController extends Controller
{
    public function home()
    {
        $truyens = Truyen::with('latestChapter')
        ->join('chapter', 'truyen.id', '=', 'chapter.idtruyen')
        ->select('truyen.*')
        ->groupBy('truyen.id','truyen.tentruyen','truyen.mota','truyen.tacgia','truyen.slug_truyen','truyen.kichhoat','truyen.iddanhmuc','truyen.theloai','truyen.hinhanh','truyen.tags','truyen.created_at','truyen.updated_at')
        ->orderByDesc('chapter.updated_at')
        ->where('truyen.kichhoat', 1)
        ->paginate(8);

        return view('pages.home', compact('truyens'));
    }
    public function danhmuc($slug)
    {
        $danhmuctruyen = DanhMuc::where('slug', $slug)->first();
        $truyen = Truyen::orderBy('id', 'DESC')->where('kichhoat', 1)->where('iddanhmuc', $danhmuctruyen->id)->get();
        $truyenmoi = Truyen::orderBy('id','DESC')->where('kichhoat',1)->get();
        return view('pages.danhmuc')->with(compact('truyen', 'danhmuctruyen','truyenmoi'));
    }
    public function theloai($slug)
    {
        $theloaitruyen = TheLoai::where('slug', $slug)->first();
        $truyen = Truyen::orderBy('id', 'DESC')
            ->where('kichhoat', 1)
            ->where('theloai', 'like', '%' . $theloaitruyen->id . '%')
            ->get();
        return view('pages.theloai')->with(compact('theloaitruyen', 'truyen'));
    }
    public function truyentranh($slug)
    {
        $truyen = Truyen::with('danhmuc')->where('slug_truyen', $slug)->where('kichhoat', 1)->first();

        $danhmuctruyen = DanhMuc::orderBy('id', 'DESC')->first();
        $chapter = Chapter::with('truyen')->orderBy('id', 'ASC')->where('idtruyen', $truyen->id)->where('kichhoat', 1)->get();
        $tongchap = Chapter::where('idtruyen',$truyen->id)->count();
        $chapter_dau = Chapter::with('truyen')->orderBy('id', 'ASC')->where('idtruyen', $truyen->id)->where('kichhoat', 1)->first();
        $cungDanhMuc = Truyen::with('danhmuc')->where('iddanhmuc', $truyen->danhmuc->id)->whereNotIn('id', [$truyen->id])->get();
        return view('pages.truyen')->with(compact('truyen', 'danhmuctruyen', 'chapter', 'cungDanhMuc', 'chapter_dau','tongchap'));
    }
    public function chapter($slug)
    {
        $truyen = Chapter::where('slug', $slug)->first();
        $chapter = Chapter::with('truyen')->where('slug', $slug)->where('idtruyen', $truyen->idtruyen)->first();
        $all_chapter = Chapter::with('truyen')->orderBy('id', 'ASC')->where('idtruyen', $truyen->idtruyen)->get();
        $next = Chapter::where('idtruyen', $truyen->idtruyen)->where('id', '>', $truyen->id)->min('slug');
        $max_id = Chapter::where('idtruyen', $truyen->idtruyen)->orderBy('id', 'DESC')->first();
        $min_id = Chapter::where('idtruyen', $truyen->idtruyen)->orderBy('id', 'ASC')->first();
        $previous = Chapter::where('idtruyen', $truyen->idtruyen)->where('id', '<', $chapter->id)->max('slug');
        return view('pages.chapter')->with(compact('chapter', 'all_chapter', 'next', 'previous', 'max_id', 'min_id'));
    }
    public function timkiem(Request $request)
    {
        $data = $request->all();
        $tukhoa = $data['tukhoa'];
        $truyen = Truyen::with('danhmuc', 'theloai')->where('tentruyen', 'LIKE', '%' . $tukhoa . '%')->orwhere('tacgia', 'LIKE', '%' . $tukhoa . '%')->get();
        return view('pages.timkiem')->with(compact('truyen', 'tukhoa'));
    }
    public function search_ajax(Request $request)
    {
        $data = $request->all();
        if ($data['keywords']) {
            $truyen  = Truyen::where('tentruyen', 'LIKE', '%' . $data['keywords'] . '%')->get();
            $output = '
            <ul class= "dropdown-menu" style= "display:block;">';
            foreach ($truyen as $key => $tr) {
                $output .= '<li class="li_search_ajax"><a href="#">' . $tr->tentruyen . '</a></li>';
            }
        }
        $output .= '</ul';
        echo $output;
    }
    public function tag($tag)
    {
        $tags = explode("-", $tag);
        $truyen = Truyen::with('danhmuc', 'theloai')->where(function ($query) use ($tags) {
            $query->where(function ($query) use ($tags) {
                foreach ($tags as $tag) {
                    $query->orWhere('tags', 'LIKE', '%' . $tag . '%');
                }
            });
        })->paginate(12);
        return view('pages.tag')->with(compact('tags', 'truyen'));
    }
}
