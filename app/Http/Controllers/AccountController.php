<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index()
    {
        return view('accounts.accounts', [
            'accounts' => Auth::user()->accounts
        ]);
    }

    public function edit(Account $account)
    {
        if ($account->user_id !== Auth::id()) {
            abort(403);
        }

        return view('accounts.edit', [
            'account' => $account
        ]);
    }

    public function update(Account $account)
    {
        if ($account->user_id !== Auth::id()) {
            abort(403);
        }

        $account->update(['label' => request('label')]);

        return redirect()->back();
    }
}
