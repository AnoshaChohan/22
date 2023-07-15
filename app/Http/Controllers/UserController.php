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
   

    public function updateUser(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:6',
    ]);

    $user = User::find($request->id);
    $user->name = $validatedData['name'];
    $user->email = $validatedData['email'];
    $user->password = $validatedData['password'];
    $user->save();

    return redirect("testData");
}

   
}

