<?php

namespace App\Http\Controllers;

use App\Models\Collections\FeaturedCryptoCollection;
use App\Models\CryptoCoin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CryptoMarketController extends Controller
{
    public function index(): View
    {
        $featuredSymbols = ['BTC', 'ETH', 'XRP', 'LTC', 'BCH', 'BNB', 'EOS', 'BSV', 'XLM', 'ADA'];
       // $featuredCoins = (new FeaturedCryptoCollection($featuredSymbols))->getFeaturedCoins();
        $featuredCoins = [];

        return view('crypto.crypto-market', [
            'featuredCoins' => $featuredCoins
        ]);
    }

    public function show($coin)
    {
        $cryptoCoin = new CryptoCoin($coin);
        return view('crypto.show-crypto', [
            'crypto' => $cryptoCoin
        ]);
    }

    public function redirectToCoin(Request $request)
    {
        return redirect()->route('/crypto-market/' . $request->search);
    }

    public function buy($coin)
    {

        return redirect()->route('crypto-market');
    }
}
