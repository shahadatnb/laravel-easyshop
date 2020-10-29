<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Validation\Rule;

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
    protected $redirectTo = '/getpremium';

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
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'username' => 'required|alpha_dash|max:30|unique:users',
            'email' => 'required|string|email|max:50',
            'password' => 'required|string|min:6|confirmed',
            'mobile' => 'required|string|max:255',
            //'skypeid' => 'required|string|max:40|unique:users',
            'hand' => 'required|unique_with:users,referralId,hand',
            'pin' => 'required|unique:users|exists:user_pins,pin|unique:users',
            'referralId' => 'required|exists:users,id',
        ],[
            'hand.unique_with' => 'This hand side is already used, please try another hand or another Placement ID',
        ]);
    }

    /**
    'email' => Rule::unique('users')->where(function ($query) {
    return $query->where('account_id', 1);
})
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {        
        return User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'mobile' => $data['mobile'],
            'referralId' => $data['referralId'],
            'hand' => $data['hand'],
            //'skypeid' => $data['skypeid'],
            'pin' => $data['pin'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
