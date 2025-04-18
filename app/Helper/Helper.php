<?php
namespace app\Helper;

use App\Models\Admin\Admin;

class Helper 
{
 

   public static function auth_admin()
   {
    
    
     return Admin::with(['role'])->where('id',session('id'))->first();
   }
}
