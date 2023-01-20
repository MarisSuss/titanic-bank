<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\MoneyTransfer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class BalanceTransferController extends Controller
{
    public function showForm(): View
    {
        $acccounts = Auth::user()->accounts;

        return view('accounts.balance-transfer', [
            'accounts' => $acccounts
        ]);
    }

    public function transfer(Request $request): RedirectResponse
    {
        $fromAccount = Account::findOrFail($request->get('from_account'));

        if ($fromAccount->user_id !== Auth::id()) {
            abort(403);
        }

        $toAccount = Account::where('number', $request->get('to_account'))->firstOrFail();
        $amount = $request->get('amount') * 100;

        $fromAccount->update([
            'balance' => $fromAccount->balance - $amount
        ]);

        $toAccount->update([
            'balance' => $toAccount->balance + $amount
        ]);

        $transfer = (new MoneyTransfer())->fill([
            'sender_user_id' => $fromAccount->user_id,
            'receiver_user_id' => $toAccount->user_id,
            'sender_account_id' => $fromAccount->id,
            'receiver_account_id' => $toAccount->id,
            'amount' => $amount,
            'currency' => $fromAccount->currency,
        ]);
        $transfer->save();

        return redirect()->back();
    }
}
