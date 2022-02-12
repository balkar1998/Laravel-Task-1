<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
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
    protected $redirectTo = RouteServiceProvider::HOME;

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
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'dob' => ['required'],
            'gender' => ['required'],
            'income' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        if(isset($data['expect_occupation']))
        {
            $expect_occupation = implode(",",$data['expect_occupation']);
        }
        else{
            $expect_occupation  = 0;
        }
        if(isset($data['expect_familytype']))
        {
            $expect_family = implode(",",$data['expect_familytype']);
        }else{
            $expect_family =  0;
        }
        if(empty($data['expect_manglik']))
        {
            $data['expect_manglik'] = 'No';
        }
        return User::create([
            'name' => $data['name'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'dob' => $data['dob'],
            'gender' => $data['gender'],
            'income' => $data['income'],
            'occupation' => $data['occupation'],
            'familytype' => $data['familytype'],
            'manglik' => $data['manglik'],
            'expect_salary' => $data['expect_salary'],
            'expect_occuption' => $expect_occupation,
            'expect_familytype' => $expect_family,
            'expect_manglik' => $data['expect_manglik'],
        ]);
    }
}
