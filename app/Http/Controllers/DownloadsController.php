<?php

namespace BIM\Http\Controllers;

use Illuminate\Http\Request;

use BIM\Http\Requests;

class DownloadsController extends Controller
{
    public function getMaterial($file_name){
        $file_path = public_path('files/'.$file_name);
        return response()->download($file_path);
    }
}
