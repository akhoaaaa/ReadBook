<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;
    protected $fillable = [
        'idtruyen','title','noidung','kichhoat','slug'
    ];
    protected $table = 'chapter';
    public $timestamps = false;

    public function truyen(){
        return $this->belongsTo('App\Models\Truyen','idtruyen','id');
    }
}
