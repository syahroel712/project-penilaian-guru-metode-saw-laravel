<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Guru_Model extends Model
{
    use SoftDeletes;
    protected $table = "tb_guru";
    protected $primaryKey = 'guru_id';
    protected $fillable = [
        'sekolah_id',
        'guru_nama', 
        'guru_tgl_lahir', 
        'guru_jekel', 
        'guru_email',
        'guru_notelp',
        'guru_alamat',
    ];
}
