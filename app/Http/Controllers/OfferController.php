<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;
use App\Models\Jop;
use App\Models\User;
use App\Models\Project;

class OfferController extends Controller
{
    //
    public function offers()
    {
        $offers = offer::all();
        $jops = Jop::all();
        $workers = User::all()->where('jop_id','!=','1');
    	return view('admin/offers',compact('offers','jops','workers'));
    }

    public function add_offer_page($project_id)
    {
        $jops = Jop::all();
        return view('user/add_offer',compact('project_id','jops'));
    }

    public function add_offer(Request $request, $project_id)
    {
        $offer = new Offer();
        $offer->description = $request->get('description');
        $offer->duration_in_days = $request->get('duration_in_days');
        $offer->price = $request->get('price');
        $offer->project_id = $project_id;
        $offer->worker_id = auth()->user()->id;
        $offer->save();
        if(auth()->user()->role >= 1){
            return redirect()->route('offers');
        }
        return redirect()->route('all_projects');
    }
    public function accept_offer($offer_id){
        $offer = Offer::find($offer_id);
        $offer->is_accepted = true;
        $offer->save();
        if(auth()->user()->role >= 1){
            return redirect()->route('offers');
        }
        return redirect()->route('all_projects');
    }

    public function update_offer_page($offer_id)
    {
        $offer = Offer::find($offer_id);
        $jops = Jop::all();
        return view('user/add_offer',compact('offer','jops'));
    }

    public function update_offer(Request $request,$offer_id)
    {
        $offer = Offer::find($offer_id);
        $offer->description = $request->get('description');
        $offer->duration_in_days = $request->get('duration_in_days');
        $offer->price = $request->get('price');
        $offer->save();
        if(auth()->user()->role >= 1){
            return redirect()->route('offers');
        }
        return redirect()->route('all_projects');
    }

    public function delete_offer($offer_id)
    {
        $offer = Offer::find($offer_id);
        $offer->delete();
        if(auth()->user()->role >= 1){
            return redirect()->route('offers');
        }
        return redirect()->route('all_projects');
    }
}
