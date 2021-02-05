<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sekolah_Model extends Model
{
    use SoftDeletes;
    protected $table = "tb_sekolah";
    protected $primaryKey = 'sekolah_id';
    protected $fillable = [
        'sekolah_npsn', 
        'sekolah_nama', 
        'sekolah_alamat',
    ];
}