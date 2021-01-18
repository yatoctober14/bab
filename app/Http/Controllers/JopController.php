<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jop;

class JopController extends Controller
{
    //
    public function jops()
    {
        $jops = Jop::all();
    	return view('admin/jops',compact('jops'));
    }

    public function add_jop(Request $request)
    {
    	$jop = new Jop();
    	$jop->name = $request->get('name');
        $jop->save();
        if($request->ajax()){
            return response()->json($jop);
        }
        return back();
    }
}
