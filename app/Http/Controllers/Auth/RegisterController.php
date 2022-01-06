<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MailController;
use App\Providers\RouteServiceProvider;
use App\Models\User;
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
    *
  *  protected function create(array $data)
  *  {
  *      return User::create([
  *          'name' => $data['name'],
  *          'email' => $data['email'],
  *          'password' => Hash::make($data['password']),
  *          'role' => $data['role'],
  *          'formation' => $data['formation']
  *      ]);
  *  }*/
    public function register(Request $request)
    {
      $user = new User();
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = Hash::make($request->password);
      $user->role = $request->role;
      $user->formation = $request->formation;
      $user->verification_code = sha1(time());
      $user->save();

      if($user != null) {
        MailController::sendSignupEmail($user->name, 'loganlenevez@gmail.com', $user->verification_code);
        return redirect()->back()->with(session()->flash('alert-success', 'Votre compte a été crée, veuillez attendre qu\'un administrateur le vérifie.'));
      }

        return redirect()->back()->with(session()->flash('alert-danger', 'Une erreur est survenue, veuillez réesayez.'));
    }

    public function verifyUser(Request $request) {
      $verification_code = \Illuminate\Support\Facades\Request::get('code');
      $user = User::where(['verification_code' => $verification_code])->first();
      if($user != null) {
        $user->is_verified = 1;
        $user->save();
        MailController::sendSignupEmailConfirmation($user->name, $user->email);
        return redirect()->route('login')->with(session()->flash('alert-success', 'Vous venez de valider le compte de ' . $user->name . ', un e-mail d\'information vient de lui être envoyé.'));
      }

      return redirect()->route('login')->with(session()->flash('alert-danger', 'Code de vérification invalide.'));
    }

}
