<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use App\Providers\RouteServiceProvider;
use App\Models\Account;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = '/login';

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
            'firstname' => ['required', 'alpha', 'max:25'],
            'middlename' => ['nullable', 'alpha', 'max:25'],
            'lastname' => ['required', 'alpha', 'max:25'],
            'gender_id' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:account'],
            'role_id' => ['required'],
            'password' => ['required', 'string', 'min:8'],
            'display_picture_link' => ['required', 'mimes:jpg,jpeg,png'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\Account
     */
    protected function create(array $data)
    {
        $pict = $data['display_picture_link'];
        $name = time() . '.' . $pict->getClientOriginalExtension();
        $location = 'image/' . $name;
        Storage::putFileAs('public/image', $pict, $name);

        return Account::create([
            'firstname' => $data['firstname'],
            'middlename' => $data['middlename'],
            'lastname' => $data['lastname'],
            'gender_id' => $data['gender_id'],
            'email' => $data['email'],
            'role_id' => $data['role_id'],
            'password' => Hash::make($data['password']),
            'display_picture_link' => $location,
        ]);
    }
}
