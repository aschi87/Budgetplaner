<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;

class BudgetplanController extends Controller {

    public function __construct()
    {
        $this->middleware('auth'); // auth
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
        return view('budgetplan', compact('user', 'budgetPlans'));
    }

}