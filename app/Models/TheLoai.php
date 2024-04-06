<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TheLoai extends Model
{
    use HasFactory;
    protected $fillable = [
        'tentheloai','slug','hinhanh','kichhoat'
    ];
    public $timestamps = false;
    protected $table = 'theloai';
    public function truyen(){
        return $this->hasMany('App\Models\Truyen');
    }
}

