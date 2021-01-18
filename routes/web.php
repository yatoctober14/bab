<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\JopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\FeedbackController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
*/

Route::get('/',[MainController::class, 'home'])->name('home');
Route::get('/how_it_work',[MainController::class, 'how_it_work'])->name('how_it_work');
Route::get('/about',[MainController::class, 'about'])->name('about');
/* all data */
Route::get('/all_projects',[ProjectController::class, 'all_projects'])->name('all_projects_guest');


Route::middleware(['AdminMiddleware'])->prefix('/admin')->group(function()
{
    /* Jops Route */
    Route::get('/jops',[JopController::class, 'jops'])->name('jops');
    Route::post('/add_jop',[JopController::class, 'add_jop'])->name('add_jop');
    
    /* Users Route */ 
    Route::get('/add_user_page',[UserController::class, 'add_user_page'])->name('add_user_page');
    Route::post('/add_user',[UserController::class, 'add_user'])->name('add_user');
    Route::get('/owners',[UserController::class, 'owners'])->name('owners');
    Route::get('/admins',[UserController::class, 'admins'])->name('admins');
    Route::get('/workers',[UserController::class, 'workers'])->name('workers');
    Route::get('/users',[UserController::class, 'users'])->name('users');
    
    /* Projects Route */ 
    Route::get('/projects',[ProjectController::class, 'projects'])->name('projects');

    /* Offers Route */ 
    Route::get('/offers',[OfferController::class, 'offers'])->name('offers');

});

Route::middleware(['auth'])->prefix('/user')->group(function (){

    /* Projects Route */

    /*first add project */ 
    Route::get('/add_project_page',[ProjectController::class, 'add_project_page'])->name('add_project_page');
    Route::post('/add_project',[ProjectController::class, 'add_project'])->name('add_project');
   
    /*second update project */ 
    Route::get('/project_offers_page/{id}',[ProjectController::class, 'project_offers_page'])->name('project_offers_page');
    Route::get('/update_project_page/{id}',[ProjectController::class, 'update_project_page'])->name('update_project_page');
    Route::post('/update_project/{id}',[ProjectController::class, 'update_project'])->name('update_project');
    
    /*third delete project */ 
    Route::get('/delete_project/{id}',[ProjectController::class, 'delete_project'])->name('delete_project');

    /* offers Route */ 
    Route::get('/add_offer_page/{id}',[OfferController::class, 'add_offer_page'])->name('add_offer_page');
    Route::get('/update_offer_page/{id}',[OfferController::class, 'update_offer_page'])->name('update_offer_page');
    Route::post('/update_offer/{id}',[OfferController::class, 'update_offer'])->name('update_offer');
    Route::post('/add_offer/{id}',[OfferController::class, 'add_offer'])->name('add_offer');
    Route::get('/accept_offer/{id}',[OfferController::class, 'accept_offer'])->name('accept_offer');
    Route::get('/delete_offer/{id}',[OfferController::class, 'delete_offer'])->name('delete_offer');


    /* Users*/
    Route::get('/profile',[UserController::class, 'user_profile_page'])->name('user_profile');
    Route::get('/update_user_page/{id}',[UserController::class, 'update_user_page'])->name('update_user_page');
    Route::post('/update_user/{id}',[UserController::class, 'update_user'])->name('update_user');
    Route::get('/delete_user/{id}',[UserController::class, 'delete_user'])->name('delete_user');

    /* all data */
    Route::get('/all_projects',[ProjectController::class, 'all_projects'])->name('all_projects');
});

Auth::routes();
