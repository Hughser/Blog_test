<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Model\User;
use App\Model\Community;
use Validator;
use Socialite;
use Redirect;
use Auth;
use Log;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     *
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function getVisitorAuth($visitor)
    {
        return Socialite::driver($visitor)->redirect();
    }

    public function getVisitorAuthCallback(Request $request, $visitor)
    {

        $community_user = Socialite::driver($visitor)->user();

        $user = User::is_Account($community_user->getEmail(), $visitor);

        if (empty($user)) {
            $new_user = new User([
            'name' => $community_user->getName(),
            'email' => $community_user->getEmail().'/'.$visitor,
            'provider' => $visitor,
          ]);
            $new_user->save();

            $new_community = new Community([
            'user_id' => $new_user->id,
            'provider_user_id' => $community_user->getId(),
            'provider' => $visitor,
          ]);
            $new_community->save();
            $user = $new_user;
        }

        if (!empty($user)) {
            Auth::login($user);
        }

        return Redirect::back();
    }

    public function getAnonymous(Request $request)
    {
      $name=$request->input('anonymous_name');
      $user=User::where('name',$name)
              ->where('provider','anonymous')->first();

      if (empty($user)) {
        $new_user = new User([
          'name' => $name,
          'email' => $name.'@com.tw',
          'provider' => 'anonymous',
        ]);
        $new_user->save();

        $user = $new_user;
      }

      if (!empty($user)) {
          Auth::login($user);
      }

      return Redirect::back();
    }
}
