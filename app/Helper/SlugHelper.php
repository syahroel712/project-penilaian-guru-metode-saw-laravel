<?php
namespace App\Helper;

class SlugHelper
{
    public static function seo_title($request) {

        $c = array (' ');
        $d = array ('-','/','\\',',','.','#',':',';','\'','"','[',']','{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+');

        $request = str_replace($d, '', $request); // Hilangkan karakter yang telah disebutkan di array $d
        $request = strtolower(str_replace($c, '-', $request)); // Ganti spasi dengan tanda - dan ubah hurufnya menjadi kecil semua
        return $request;
    }
}
?>

