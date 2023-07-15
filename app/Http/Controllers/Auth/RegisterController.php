<?php
namespace App\Http\Controllers\Auth;
use App\Models\User;
use App\Models\Admin;
use App\Models\Subscriber;
use App\Models\UnPaidUser;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{use RegistersUsers;
    /**
    * Where to redirect users after registration.
    *
    * @var string
    */
    protected $redirectTo = '/home';
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
    $this->middleware('guest');
    $this->middleware('guest:admin');
    $this->middleware('guest:subscriber');
    $this->middleware('guest:unPaidUser');


}
    /**
    * Get a validator for an incoming registration request.
    *
    * @param array $data
    * @return \Illuminate\Contracts\Validation\Validator
    */
    protected function validator(array $data)
    {
    return Validator::make($data, [
    'name' => ['required', 'string', 'max:255'],
    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    'password' => ['required', 'string', 'min:6', 'confirmed'],
    ]);
    }
    /**
    * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
    */
    public function showAdminRegisterForm()
    {
    return view('auth.register', ['url' => 'admin']);
    }
    
    public function showSubscriberRegisterForm()
    {
    return view('auth.register', ['url' => 'subscriber']);
    }
    
    public function showUnPaidUserRegisterForm()
    {
    return view('auth.register', ['url' => 'unPaidUser']);
    }
    
    protected function create(array $data)
{
return User::create([
'name' => $data['name'],
'email' => $data['email'],
'password' => Hash::make($data['password']),
]);
}
/**
* @param Request $request
*
* @return \Illuminate\Http\RedirectResponse
*/
protected function createAdmin(Request $request)
{
$this->validator($request->all())->validate();
Admin::create([
'name' => $request->name,
'email' => $request->email,
'password' => Hash::make($request->password),
]);
return redirect()->intended('login/admin');
}

protected function createSubscriber(Request $request)
{
$this->validator($request->all())->validate();
Subscriber::create([
'name' => $request->name,
'email' => $request->email,
'password' => Hash::make($request->password),
]);
return redirect()->intended('login/subscriber');
}
protected function createUnPaidUser(Request $request)
{
$this->validator($request->all())->validate();
UnPaidUser::create([
'name' => $request->name,
'email' => $request->email,
'password' => Hash::make($request->password),
]);
return redirect()->intended('login/unPaidUser');
}
/**
* @param Request $request
*
* @return \Illuminate\Http\RedirectResponse
*/

}