<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhmucTruyen extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'tendanhmuc','motadanhmuc','trangthai'
    ];
    protected $primaryKey = 'id';
    protected $table = 'danhmuc';
}
