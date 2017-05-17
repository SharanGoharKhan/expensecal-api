<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
  
    protected $table = 'expense';
    protected $fillable = ['user_id','category_id','amount','date_expense'];
}
