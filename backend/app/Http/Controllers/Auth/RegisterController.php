<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Menber;
use App\Models\Learning_language;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:menbers'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'introduction' => ['required', 'string',' max:300'],
            'birthday' => [ 'required','string'],
            'nationality' => [ 'required','string'],
            'learning_language' => [ 'required','string'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\Menber
     */
    protected function create(array $data)
    {
         $menber=Menber::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'introduction' => $data['introduction'],
            'birthday' => $data['birthday'],
            'nationality' => $data['nationality'],
            'learning_language' => $data['learning_language'],
        ]);
        $learning_language = new Learning_language;
        $learning_language->language = $data['learning_language'];
        $learning_language->menber_id = $menber->id;
        $learning_language->save();
        return $menber;
    }

    
}