<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jop;
use App\Models\Project;
use App\Models\User;
use App\Models\Offer;
use Auth;
class ProjectController extends Controller
{
    public function projects()
    {
        $projects = Project::all();
        $jops = Jop::all();
        $offers = Offer::all();
        $owners = User::all()->where('jop_id','=','1');
    	return view('admin/projects',compact('projects','jops','offers','owners'));
    }

    public function add_project_page(){
        $jops = Jop::all()->where('id','>','1');
        return view('user/add_project',compact('jops'));
    }

    public function add_project(Request $request)
    {
        $project = new Project();
        $project->name = $request->get('name');
        $project->description = $request->get('description');
        $project->address = $request->get('address');
        $project->government_id = $request->get('government_id');
        $project->city_id = $request->get('city_id');
        $project->district_id = $request->get('district_id');
        $project->jop_id = $request->get('jop_id');
        $project->duration_in_days = $request->get('duration_in_days');
        $project->price = $request->get('price');
        $project->owner_id = auth()->user()->id;
        $project->save();

        if(auth()->user()->role >= 1){
            return redirect()->route('projects');
        }
        return redirect()->route('all_projects');
    }

    public function project_offers_page($project_id){
        $project = Project::find($project_id);
        return view('user/project_offers_page',compact('project'));
    }
    
    public function update_project_page($project_id)
    {
        $project = Project::find($project_id);
        $jops = Jop::all();
        return view('user/add_project',compact('project','jops'));
    }

    public function update_project(Request $request, $project_id)
    {
        $project = Project::find($project_id);
        $project->name = $request->get('name');
        $project->description = $request->get('description');
        $project->address = $request->get('address');
        $project->government_id = $request->get('government_id');
        $project->city_id = $request->get('city_id');
        $project->district_id = $request->get('district_id');
        $project->jop_id = $request->get('jop_id');
        $project->duration_in_days = $request->get('duration_in_days');
        $project->price = $request->get('price');
        $project->save();
        if(auth()->user()->role >= 1){
            return redirect()->route('projects');
        }
        return redirect()->route('all_projects');
    }

    public function delete_project($project_id){
        $project = Project::find($project_id);
        $project->offers->delete();
        $project->delete();
        if(auth()->user()->role >= 1){
            return redirect()->route('projects');
        }
        return redirect()->route('all_projects');
    }

    public function all_projects(){
        $jops = Jop::all();
        $users = User::all();
        $projects = Project::all();
        $authorized =false;
        if(Auth::check()){
            $authorized = true;
            //return view('user/all_projects',compact('projects','jops','users','authorized'));
        }
        // else{
        //     return view('user/all_projects',compact('projects','jops','users','authorized'));
        // }
        return view('user/all_projects',compact('projects','jops','users','authorized'));
    }
}