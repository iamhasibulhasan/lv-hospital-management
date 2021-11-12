<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Image Upload Function
     */
    public function imageUpload($request, $file, $path){
        if($request->hasFile($file)){
            $img = $request->file($file);
            $unique_name = md5(time().rand()).'.'.$img->getClientOriginalExtension();
            $img-> move(public_path($path), $unique_name);
            return $unique_name;
        }else{
            return 'avatar.png';
        }

    }
}
