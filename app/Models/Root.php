<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes as SoftDeletingTrait;

abstract class Root extends Model{

	 use SoftDeletingTrait;
    
    //There attributes will not be mass assigned
    protected $guarded = array('id', 'deleted_at', 'updated_at', 'created_at');

    protected $hidden = array('pivot');

}
?>