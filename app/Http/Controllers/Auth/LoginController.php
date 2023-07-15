<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    

    use AuthenticatesUsers;

    protected $redirectTo = '/home';

public function __construct()
{
$this->middleware('guest')->except('logout');
$this->middleware('guest:admin')->except('logout');
$this->middleware('guest:unPaidUser')->except('logout');
$this->middleware('guest:subscriber')->except('logout');
}

public function showAdminLoginForm()
{
    return view('auth.login', ['url' => 'admin']);
}


    public function adminLogin(Request $request)
    {
    $this->validate($request, [
    'email' => 'required|email',
    'password' => 'required|min:6'
    ]);
    if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember')))
     {
    return redirect()->intended('/admin');
    }
    return back()->withInput($request->only('email', 'remember'));
}

public function showSubscriberLoginForm()
{
    return view('auth.login', ['url' => 'subscriber']);
}

    public function subscriberLogin(Request $request)
    {
    $this->validate($request, [
    'email' => 'required|email',
    'password' => 'required|min:6'
    ]);
    if (Auth::guard('subscriber')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember')))
     {
    return redirect()->intended('/subscriber');
    }
    return back()->withInput($request->only('email', 'remember'));
}

public function showUnPaidUserLoginForm()
{
    return view('auth.login', ['url' => 'unPaidUser']);
}

    public function subscriberUnPaidUser(Request $request)
    {
    $this->validate($request, [
    'email' => 'required|email',
    'password' => 'required|min:6'
    ]);
    if (Auth::guard('unPaidUser')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember')))
     {
    return redirect()->intended('/unPaidUser');
    }
    return back()->withInput($request->only('email', 'remember'));
}



}