<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
  
    protected $table = 'users';
    protected $fillable = ['username','email','gender','date_of_birth'];
    protected $hidden = ['password','access_token','token_expired'];

    public function setAccessToken()
    {
		$this->token_expired = date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s") . " + 3 months"));;
        $this->access_token = md5($this->email . $this->token_expired . rand(10000,99999));
        $this->save();
    }
}
User::created(function($user){
    $user->setAccessToken();
});
User::creating(function($user)
{
	$user->password=password_hash($user->password,PASSWORD_BCRYPT,['cost'=>11]);
});