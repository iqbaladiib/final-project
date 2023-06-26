<?php

namespace App\Http\Controllers\Auth;

use App\Events\CreateUserEvent;
use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Siswa;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Auth\Authenticatable as AuthAuthenticatable;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
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

    use RegistersUsers {
        register as defaultRegister;
    }

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
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'confirmed'],
            'role' => ['required', 'string']

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $user = $this->createUser($request->all());

        event(new Registered($user));

        $this->guard()->login($user);

        return redirect($this->redirectPath());
        

    }
    protected function createUser(array $data)
{
    $user = User::create([
        'username' => $data['username'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
        'role' => $data['role'],
    ]);

    if ($data['role'] === 'siswa') {
        Siswa::create([
            'nama' => null,
            'nisn' => null,
            'jk' => null,
            'nama_ortu' => null,
            'no_telp' => null,
            'user_id' => $user->id,
            'kelas_id' => null,
            // Tambahkan atribut lainnya untuk data siswa
        ]);
    } elseif ($data['role'] === 'guru') {
        Guru::create([
            'nama' => null,
            'nip' => null,
            'no_telp' => null,
            'user_id' => $user->id
            // Tambahkan atribut lainnya untuk data guru
        ]);
    }

    return $user;
}
}
