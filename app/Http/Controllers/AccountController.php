<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Collections\CurrenciesCollection;
use http\Client\Curl\User;
use Illuminate\Http\RedirectResponse;
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

    public function showAddAccountForm()
    {
        return view('accounts.add');
    }

    public function addAccount(Request $request): RedirectResponse
    {
        $account = (new Account())->fill([
            'number' => 'TB-' . rand(1000000000, 9999999999),
            'label' => $request->label,
            'currency' => $request->currency,
            'balance' => 0
        ]);

        Auth::user()->accounts()->save($account);

        return redirect()->route('accounts');
    }

}
