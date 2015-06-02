<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Category;

class Budget extends Model {

    protected $table = 'budgets';

    protected $fillable = ['name'];

    public function categories()
    {
        return $this->hasMany('App\Category');
    }

    public function sum($budget_id)
    {
        $sum = 0;
        $categories = DB::table('categories')->where('budget_id', $budget_id)->get();
        $entries = DB::table('entries')->where('category_id', 'like', $categories)->get();

            foreach ($entries as $entry)
            {
                $sum = $sum + ($entry->amount);
                $sum += 1;
            }
        $sum += 1000;
        return $sum;
    }

}
