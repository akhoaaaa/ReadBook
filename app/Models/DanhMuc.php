<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhMuc extends Model
{
    use HasFactory;
    public $timestamps = true;

    protected $fillable = [
        'tendanhmuc','slug', 'mota','kichhoat','created_at','updated_at'
    ];
    protected $table = 'danhmuc';
    public function truyen(){
        return $this->hasMany('App\Models\Truyen');
    }

}
