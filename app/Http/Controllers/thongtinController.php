<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class thongtinController extends Controller
{
    //
    function thongTin(){
        $tt = [
            [
                'id' => '1',
                'name' => 'hai',
                'masv' => 'PH41691',
                'diachi'=> 'ha noi'
            ]
            ];
       return view('lab1')->with(['students' => $tt]);
    }
}
