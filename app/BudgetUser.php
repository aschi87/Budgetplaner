<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class BudgetUser extends Model {

    protected $table = 'budget_user';

    protected $fillable = ['budget_id', 'user_id'];

}