<?php

namespace App\Http\Controllers\Auth;

use App\Entities\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

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
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */

    public function register(Request $request)
    {
        try {
            $this->validator($request->all())->validate();
            $email = $request->input('email');
            $password = $request->input('password');
            $isAuth = $request->input('remember') ? true : false;
            $objUser = $this->create(['email'=>$email, 'password'=>$password]);
        } catch (\Exception $e) {
            dd('Something went wrong, try again!');
        }

        if (!($objUser instanceof User))
        {
            return back()->with('error', "Can't create user");
        }
        if($isAuth)
        {
            $this->guard()->login($objUser);
        }
        return redirect(route('account'))->with('success', 'You have successfully registered!');



        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }

    /**
     * @param array $data
     * @return mixed
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            /*'name' => 'required|string|max:255',*/
            'email' => 'required|string|email|max:128|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * @param array $data
     * @return $this|\Illuminate\Database\Eloquent\Model
     */
    protected function create(array $data)
    {
        return User::create([
           /* 'name' => $data['name'],*/
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
