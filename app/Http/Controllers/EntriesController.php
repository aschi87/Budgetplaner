<?php

namespace App\Http\Controllers;

use App\User;
use App\Budget;
use App\Category;
use App\Entry;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent;
use Request;

class EntriesController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        // Sollte noch überprüft werden, damit man nicht über die URL die Einträge einsehen kann.
        $user = User::find(Auth::id());
        $budget = Budget::find($id);
        $categories = $budget->categories;
        return view('entries', compact('user', 'budget', 'categories', 'id'));
    }

    public function saveEntry(Request $request, $id)
    {
        $entry = new Entry;
        $entry->name = Request::input('name');
        $entry->amount = Request::input('amount');
        $entry->date = Request::input('date');
        $entry->category_id = Request::input('category');

        $entry->save();

        return redirect('plan/'.$id);
    }

    public function saveCategory(Request $request, $id)
    {
        $category = new Category;
        $category->name = Request::input('category');
        $category->limit = Request::input('limit');
        $category->budget_id = $id;

        $category->save();

        return redirect('plan/'.$id);
    }

}
