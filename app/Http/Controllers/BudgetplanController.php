<?php

namespace App\Http\Controllers;

use App\User;
use App\Budget;
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
        $budgetPlans = Budget::all();
        return view('budgetplan', compact('user', 'budgetPlans'));
    }

}