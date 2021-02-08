<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kriteria_Penilaian_Model extends Model
{
    use SoftDeletes;
    protected $table = "tb_penilaian";
    protected $primaryKey = 'penilaian_id';
    protected $fillable = [
        'guru_id', 
        'penilaian_portofolio',
        'penilaian_presentasi',
        'penilaian_wawancara',
        'penilaian_tes_tulis',
    ];
}