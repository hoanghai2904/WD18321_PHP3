<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    function showUser(){
        $user = [
            [
                'id' => '1',
                'name' => 'hai'

            ],
            [
                'id' => '2',
                'name' => 'hai2'

            ],
            ];
       return view('list')->with(['usezrs' => $user]);
    }

    function getUser($id,$name = ''){
        echo $id;
        echo "<br>";
        echo $name;
    }

    function updateUser(Request $request){
        echo $request->id;
    }
}
