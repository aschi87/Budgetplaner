<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

    protected $table = 'categories';

    protected $fillable = ['name', 'limit', 'budget_id'];

    public function entries()
    {
        return $this->hasMany('App\Entry');
    }

}
