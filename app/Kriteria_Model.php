<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kriteria_Model extends Model
{
    use SoftDeletes;
    protected $table = "tb_kriteria";
    protected $primaryKey = 'kriteria_id';
    protected $fillable = [
        'kriteria_nama', 
        'kriteria_bobot',
    ];
}