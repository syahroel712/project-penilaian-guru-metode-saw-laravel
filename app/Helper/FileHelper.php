<?php
namespace App\Helper;

use Illuminate\Http\Request;

class FileHelper
{
	public static function UploadFile(Request $request, $name, $upload_location, $nama_file = null)
	{
		// masukan gambar setelah berhasil validasi data
                $file = $request->file($name);
                if(!$nama_file)
                {
                        // $nama_file = time()."_".preg_replace('/[^A-Za-z0-9_\-\.]/', '_', $file->getClientOriginalName());
        	        $nama_file = rand()."_".time().".".$file->getClientOriginalExtension();
                }

                $file->move($upload_location, $nama_file);
                return $nama_file;
	}
}