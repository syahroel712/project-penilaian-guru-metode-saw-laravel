<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use DB;

class Admin_Model extends Model
{
    use SoftDeletes;
    protected $table = "tb_admin";
    protected $primaryKey = 'admin_id';
    protected $fillable = [
        'admin_name', 'admin_email', 'admin_password', 'admin_notelp', 'admin_level',
    ];


    public static function GetValidationRule($rule_name)
    {
        return self::$validation_rule[$rule_name];
    }

    public function CheckLoginAdmin($email, $password)
    {
        $data_user = $this->where("admin_email", $email)->get();
        // dd(count($data_user) == 1);
        if (count($data_user) == 1) {
            if (Hash::check($password, $data_user[0]->admin_password)) {
                unset($data_user[0]->password);
                $data_user[0]->level = "Admin";
                return $data_user[0];
            }
        }
        return false;
    }
}
