<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model {

    protected $table = 'entries';

    protected $fillable = ['name', 'amount', 'date', 'category_id'];

}
