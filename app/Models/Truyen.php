<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use mysql_xdevapi\Table;

class Truyen extends Model
{
    use HasFactory;

    protected $dates = [
        'created_at',
        'updated_at'
    ];
    protected $fillable = [
        'tentruyen', 'mota', 'tacgia', 'kichhoat', 'slug_truyen', 'iddanhmuc', 'theloai', 'hinhanh', 'created_at', 'updated_at', 'tags'
    ];
    protected $table = 'truyen';

    public function danhmuc()
    {
        return $this->belongsTo('App\Models\DanhMuc', 'iddanhmuc', 'id');
    }
    public function chapter()
    {
        return $this->hasMany('App\Models\Chapter', 'idtruyen', 'id');
    }
    public function theloai()
    {
        return $this->belongsTo('App\Models\TheLoai', 'theloai', 'id');
    }
    public function latestChapter()
    {
        return $this->hasOne('App\Models\Chapter', 'idtruyen', 'id')->latest();
    }
}
