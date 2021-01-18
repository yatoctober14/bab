<?php

namespace App\Http\Controllers;
use App\Models\Jop;
use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    //
    public function home(){
        $jops = Jop::all()->where('id','>','1');
        $users = User::all()->where('jop_id','>','1');
        return view('index',compact('jops','users'));
    }
    public function about(){
        $jops = Jop::all()->where('id','>','1');
        return view('about',compact('jops'));
    }
    public function how_it_work()
    {
        $jops = Jop::all()->where('id','>','1');
    	return  view('how_it_work',compact('jops'));
    }
}
