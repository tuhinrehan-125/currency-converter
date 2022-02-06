<?php

namespace App\Http\Controllers;

use AmrShawky\LaravelCurrency\Facade\Currency;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Repositories\Contracts\ICurrency;

class CurrencyController extends Controller
{

    protected $currencies;
    public function __construct(ICurrency $currencies){
        $this->currencies = $currencies;
    }

    public function index() {

        $response = Http::get('http://data.fixer.io/api/latest?access_key=b16ef78cec043c29a3ea337478169f7f');
        
        $codes = $response['rates'];
        
        // $codes = Currency::rates()->latest()->get();

        return view('currency-converter.index', ['codes'=>$codes]);
    }

    public function convert(Request $request) {
        // dd($request);
        $request->validate([
            'amount' => 'numeric|min:0',
            'from' => 'required',
            'to' => 'required'
        ]);
        $converted = Currency::convert()
                    ->from($request->from)
                    ->to($request->to)
                    ->amount($request->amount)
                    ->round(2)
                    ->source('USD')
                    ->get();

        return back()->with([
            'conversion' => $request->amount . ' ' . $request->from . 'is equal to' .
            $converted . ' ' . $request->to,
            'amount' => $request->amount,
            'from' => $request->from,
            'to' => $request->to
        ]);
    }
}