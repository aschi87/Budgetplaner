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

    public function sum()
    {
        $sum = 0;
        $categories = $this->categories;
        foreach ($categories as $category)
        {
            $entries = $category->entries;
            foreach($entries as $entry) {
                $sum += $entry->amount;
            }
        }
        return $sum;
    }

    public function totalLimit()
    {
        $categories = $this->categories;
        $totalLimit = 0;
        foreach ($categories as $category)
        {
            $totalLimit += $category->limit;
        }
        return $totalLimit;
    }

    public function percent()
    {
        $budgetLimit = $this->totalLimit();

        if($budgetLimit == 0) {
            return 0;
        }

        return 100 / $budgetLimit * $this->sum();
    }

}
