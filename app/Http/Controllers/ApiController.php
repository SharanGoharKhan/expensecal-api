<?php namespace App\Http\Controllers;

use DB;
use Input;

class ApiController extends Controller{
	/*
	   	A model associated with a Resource
	*/
	protected $model;
	public function __construct(){
        $this->middleware("auth");
	}
	public function index($parent = ""){
		$query = DB::table($this->model->getTable());
		foreach (Input::all() as $key => $value){
			switch($key){
				case 'q': 
                    $query = $this->model->applySearchQuery($query,$value);
                    break;
                default:
                    $query->where($key,'=',$value);    
			}
		}
		return $query->get();
	}
	/*
        Get a single resource
    */
    public function show($model,$subResourceId=0){
        if($subResourceId){
            return $this->model->find($subResourceId);
        }
        return $model;
    }
    /*
        Store a resource
    */
    public function store($parent = ""){   
        $record = $this->model->create(Input::all());        
        if (!$record->id){
            App::abort(401, "The operation requested couldn't be completed");
        }
        return $record;
    }
     /*
        Update a resource
    */
    public function update($model, $subResourceId=0){
        if($subResourceId){
            $model = $this->model->find($subResourceId);
        }
        $model->fill(Input::all());
        $model->save();
        return $model;
    }
    /*
        Delete a resource
    */
    public function destroy($model,$subResourceId=0){
        $response = array('success' => false);
        if($subResourceId){
            $response['success'] = $this->model->find($subResourceId)->delete();    
        }
        $response["success"] = $model->delete();

        return $response;
    }