<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserController extends Controller
{
    function testData()
    {
         $data=User::all();
        return view('user',['users'=>$data]);
    }

    function deleteUser($id)
    {
        $data=User::find($id);
        $data->delete();
        return redirect("testData");
    }
    
    function showUpdate($id)
    {
        $data=User::find($id);
        return view("updateUser",['data'=>$data]);
    }
   

    function updateUser(Request $req)
    {
        $data=User::find($req->id);
        $data->name=$req->name;
        $data->email=$req->email;
        $data->password=$req->password;
        $data->save();
        return redirect("testData");

    }

   
}

