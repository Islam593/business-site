<?php

namespace App\Http\Controllers;

use Islamtareqgit\Packagist\Tareq;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /** 
     * photo update system
     */


     // Test function

     public function test()
     {
       return Tareq::uname('.jpg');
     }
           
     public function fileUpload($request,$field_name, $path, string $data = NULL)
     {
         
        if($request-> hasFile($field_name)){
            $file = $request-> file($field_name);
            $unique_name = md5(time().rand()).'.'. $file-> getClientOriginalExtension();
            $file-> move(public_path($path), $unique_name);
            if(file_exists($path . $data) && $data != NULL){
             unlink($path.$data);

            }
            
          }else{
       
            $unique_name = $data;
          }
          return $unique_name;
       
     }

     /**
      * Make slug
      */


      public function slugMake($title)
      {
        $lowerdata = strtolower($title);
        return str_replace(' ', '-', $lowerdata);
      }

      // Array to JSON Convert

      public function jsonEnc(Array $arr)
      {
        return json_encode($arr);
      }


      //  JSON to array Convert

      public function jsondecode(String $str, $type = false)
      {
        return json_decode($str, $type);
      }

}
