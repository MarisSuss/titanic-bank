<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TradePartnersController extends Controller
{
    public function index()
    {
        return view('trade-partners');
    }
}
