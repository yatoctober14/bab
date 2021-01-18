<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Jop;
use App\Models\Project;
use Illuminate\Support\Facades\Hash;
use File;
use Auth;
class UserController extends Controller
{
    public function owners()
    {
        $jops = Jop::all();
    	$owners = User::all()->where('jop_id','1');
    	return view('admin/users',compact('owners','jops'));
    }
    public function workers()
    {
        $jops = Jop::all();
    	$workers = User::all()->where('jop_id','!=','1');
    	return view('admin/users',compact('workers','jops'));
    }

    public function admins()
    {
        $jops = Jop::all();
        $admins = User::where('role','>','0')->get();
    	return view('admin/users',compact('admins','jops'));
    }
    public function users()
    {
        $jops = Jop::all();
        $users = User::all();
    	return view('admin/users',compact('users','jops'));
    }
    public function add_user_page()
    {
        $jops = Jop::all();
        return view('admin/add_user',compact('jops'));
    }

    public function add_user(Request $request)
    {
        $user = new User();
        if($request->hasFile('user_image')) 
        {
            $file = $request->file('user_image');
            $userimage_name = time().$file->getClientOriginalName();
            $userimage_path = 'assets/images/user_images/';
            $file->move($userimage_path,$userimage_name); 
            $userimage = $userimage_path.$userimage_name;
            $user->user_image = $userimage;
        }
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->jop_id = $request->get('jop');
        $user->country_id = $request->get('country_id');
        $user->government_id = $request->get('government_id');
        $user->city_id = $request->get('city_id');
        $user->state_id = $request->get('state_id');
        $user->address = $request->get('address');
        $user->national_id = $request->get('national_id');
        $user->date_of_birth = $request->get('birthdate');
        $user->phone = $request->get('phone');
        $user->gender = $request->get('gender');
        $user->role = 0;
        $user->phone = $request->get('phone');
        $user->date_of_birth = $request->get('birthdate');
        $user->rating = 0.0;
        $user->save();
        return redirect()->route('users');
    }

    public function user_profile_page(){
        $user = User::find(auth()->user()->id);
        return view('user/user_profile',compact('user'));
    }

    public function update_user_page($user_id){
        $user = User::find($user_id);
        $jops =Jop::all();
        return view('user/update_user_page',compact('user','jops'));
    }


    public function update_user(Request $request,$user_id){
        
        $user = User::find($user_id);
        if($request->hasFile('user_image')) 
        {   
            File::delete($user->user_image);
            $file = $request->file('user_image');
            $userimage_name = time().$file->getClientOriginalName();
            $userimage_path = 'assets/images/user_images/';
            $file->move($userimage_path,$userimage_name); 
            $userimage = $userimage_path.$userimage_name;
            $user->user_image = $userimage;
            $user->save();
        }
        if($request->has('name')) 
        {
            $user->name = $request->get('name');
            $user->save();
        }
        if($request->has('user_bio')) 
        {
            $user->user_bio = $request->get('user_bio');
            $user->save();
        }
        if($request->has('email')) 
        {
            $user->email = $request->get('email');
            $user->save();
        }
        if($request->has('address')) 
        {
            $user->address = $request->get('address');
            $user->save();
        }
        if($request->has('jop_id')) 
        {
            $user->jop_id = $request->get('jop_id');
            $user->save();
        }
        if($request->has('government_id')) 
        {
            $user->government_id = $request->get('government_id');
            $user->save();
        }
        if($request->has('city_id')) 
        {
            $user->city_id = $request->get('city_id');
            $user->save();
        }
        if($request->has('state_id')) 
        {
            $user->state_id = $request->get('state_id');
            $user->save();
        }
        if(auth()->user()->role >= 1){
            return redirect()->route('users');
        }
        return redirect()->route('user_profile');
    }

    public function delete_user($user_id){
        $user = User::find($user_id);
        if(auth()->user()->id == $user_id){
            Auth::logout();
            File::delete($user->user_image);
            $user->delete();
            return redirect()->route('home');
        }
        else{
            File::delete($user->user_image);
            $user->delete();
            return redirect()->route('users');
        }
    }
    public function rating_form(){

    }
}
