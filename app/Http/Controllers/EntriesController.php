<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent;
use Illuminate\Support\Facades\DB;

class EntriesController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     *
     *
     * @return Response
     */
    public function index($id)
    {
        $user = User::find(Auth::id());
        $budgetPlans = $user->budgets;
        // Achtung: von User 1
        $entriesFromUserOne = DB::select(DB::raw("SELECT e.date, e.name AS entryName, c.name AS categoryName, e.amount,c.budget_id, b.name, bu.user_id FROM entries e INNER JOIN categories c ON e.category_id = c.id INNER JOIN budgets b ON c.budget_id = b.id INNER JOIN budget_user bu ON bu.budget_id = c.budget_id AND bu.user_id = 1 AND c.budget_id = $id;"));
        $categoryIdName = DB::table('categories')->select('id', 'name')->get();
        return view('entries', compact('user', 'budgetPlans', 'entriesFromUserOne', 'categoryIdName', 'id'));
    }

    public function saveEntry($id)
    {
        $categoryIdName = DB::table('categories')->select('id', 'name')->get();
        $catName = $categoryIdName->select('id')->where('name', 'Myadfasdf');

        DB::table('entries')->insert(
            array('name' => 'InsertPosten', 'amount' => 111, 'date' => '1987-03-14', 'category_id' => $catName)
        );
    }

}
