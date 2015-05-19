<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model {

    protected $table = 'budgets';

    protected $fillable = ['name'];

}
