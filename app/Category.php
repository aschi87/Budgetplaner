<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Category extends Model {

    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'limit', 'budget_id'];

    public function entries()
    {
        return $this->hasMany('App\Entry')->orderBy('date');
    }

    public function moneyLeft()
    {
        $limit = $this->limit;
        $entries = $this->entries;
        foreach ($entries as $entry)
        {
            if ($entry->amount > 0) {
                $limit -= $entry->amount;
            }
        }
        return $limit;
    }
}
