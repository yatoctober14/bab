<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Jop;
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
    
    public function showRegistrationForm()
    {
        $jops = Jop::all();
        return view('auth.signup',compact('jops'));
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
            'name' => ['required', 'string', 'max:255','regex:/^[\p{Arabic} ]+$/u'],//"regex:/^[\p{Arabic} ]+$/u"
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],//'regex:[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$'
            'password' => ['required', 'string', 'min:5', 'confirmed'],
            'jop' => ['required', 'string'],        
            'country_id' => ['required', 'string'],
            'government_id' => ['required', 'string'],
            'city_id' => ['required', 'string'],
            'state_id' => ['required', 'string'],
            'address' => ['required', 'string','min:3'],//"regex:[A-Za-z0-9'\.\-\s\,]"
            'national_id' => ['required', 'min:14', 'max:14','unique:users,national_id'],//'regex:(2|3)[0-9][1-9][0-1][1-9][0-3][1-9](01|02|03|04|11|12|13|14|15|16|17|18|19|21|22|23|24|25|26|27|28|29|31|32|33|34|35|88)\d\d\d\d\d'
            'birthdate' => ['required'],
            'phone' => ['required','min:5','unique:users,phone'],//,'regex:^(\(?\+?[0-9]*\)?)?[0-9_\- \(\)]*$'
            'gender' => ['required','string'],
            'terms-agree'=>['required'],
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
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'address' => $data['address'],
            'national_id' => $data['national_id'],
            'country_id' => $data['country_id'],
            'government_id' => $data['government_id'],
            'city_id' => $data['city_id'],
            'state_id' => $data['state_id'],
            'phone' => $data['phone'],
            'gender' => $data['gender'],
            'phone' => $data['phone'],
            'date_of_birth' => $data['birthdate'],
            'rating' => 0.0,
            'role' => 0,
            'jop_id' => $data['jop']
        ]);
    }
}
