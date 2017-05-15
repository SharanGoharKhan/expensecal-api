<?php namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Models\User;
use Input;

class UserController extends ApiController{
	public function __construct(){
        parent::__construct();
		$this->model = new User();
	}
	public function __hasAccess($user){
        if($user->id != \Auth::user()->id){
            \App::abort(403, "You don't have access to the resource");
        }
    }
    public function index($parent = ""){
        \App::abort(403, "You don't have access to the resource");
    }
    public function store($parent = ""){   
        \App::abort(403, "You don't have access to the resource");
    }
     /*
        Get a single resource
    */
    public function show($model,$subResourceId=0){
    	$this->__hasAccess($model);
    	$user = parent::show($model,$subResourceId);
    	return $user;
    }
    public function update($user, $subResourceId=0){
        $this->__hasAccess($user);
         if ($user->id != \Auth::user()->id){
            \App::abort(403, "You don't have access to the resource");
        }
        return $user;
    }
    public function destroy($model,$subResourceId=0){
        $this->__hasAccess($model);
        return parent::destroy($model,$subResourceId);
    }
}