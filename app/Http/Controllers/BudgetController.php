<?php

namespace App\Http\Controllers;

use App\User;
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

        $budgetUser = new BudgetUser;
        $budgetUser->budget_id = $entry->id;
        $budgetUser->user_id = $user->id; // Evtl. Auth::id();
        $budgetUser->save();

        return view('home');
    }

}
