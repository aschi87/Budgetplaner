<?php

namespace App\Http\Controllers;

use App\User;
use App\Budget;
use App\Entry;
use App\BudgetUser;
use App\Category;
use Request;
use DB;
use Illuminate\Support\Facades\Auth;

class BudgetController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

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
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
        $user = User::find(Auth::id());
        $budgetPlans = $user->budgets;
		return view('home', compact('user', 'budgetPlans'));
	}

    public function saveBudget(Request $request)
    {
        $user = User::find(Auth::id());

        $entry = new Budget;
        $entry->name = Request::input('name');
        $entry->save();

        $entryId = $entry->id;
        $userId = $user->id;

        $budgetUser = new BudgetUser;
        $budgetUser->budget_id = $entryId;
        $budgetUser->user_id = $userId;
        $budgetUser->save();

        $budgetPlans = $user->budgets;

        return view('home', compact('user', 'budgetPlans'));
    }

    public function deleteAllBudgets()
    {
        $user = User::find(Auth::id());
        $userId = $user->id;
        $budgetsOfUser = DB::table('budget_user')->where('user_id', $userId)->get();
        if(is_array($budgetsOfUser)) {

            foreach ($budgetsOfUser as $budgetOfUser) {
                $budget = Budget::find($budgetOfUser->budget_id);
                $categories = $budget->categories;
                    foreach ($categories as $category) {
                        $entries = $category->entries;
                        foreach ($entries as $entry) {
                            Entry::find($entry->id)->delete();
                        }
                        Category::find($category->id)->delete();
                        $budgetId = $category->budget_id;
                    }
                BudgetUser::where('user_id', $userId)->delete();
                Budget::where('id', $budgetId)->delete();
            }

        }
        $budgetPlans = $user->budgets;
        return view('home', compact('user', 'budgetPlans'));
    }

    public function shareBudget(Request $request)
    {
        $planId = Request::input('planId');
        $users = Request::input('users');

        if(is_array($users)) {
            foreach ($users as $userId) {
                $budgetUser = new BudgetUser;
                $budgetUser->budget_id = $planId;
                $budgetUser->user_id = $userId;
                $budgetUser->save();
            }
        }

        return redirect('plan/'.$planId);
    }

}
