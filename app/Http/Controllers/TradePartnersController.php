<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TradePartnersController extends Controller
{
    public function index()
    {
        return view('partners.trade-partners');
    }

    public function redirectToPartner(Request $request)
    {
        return redirect()->route('/trade-partners/' . $request->search);
    }

    public function show($partner): View
    {
        var_dump($partner);


        return view('partners.show-partner', ['partner' => $partner]);
    }
}
