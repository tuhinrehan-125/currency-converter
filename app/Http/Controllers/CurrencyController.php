<?php

namespace App\Http\Controllers;

use AmrShawky\LaravelCurrency\Facade\Currency;

use Illuminate\Http\Request;
use App\Models\Currency as CurrencyModel;
use Illuminate\Support\Facades\Http;
use App\Repositories\Contracts\ICurrency;
use App\Repositories\Eloquent\Criteria\LatestFirst;
use Illuminate\Support\Facades\DB;

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
                    ->get();
                
        if($converted != null){
            $this->currencies->create([
                'amount' => $request->amount,
                'from_currency' => $request->from,
                'destination_currency' => $request->to,
                'converted_amount' => $converted
            ]);
        }

        return back()->with([
            'conversion' => $request->amount . ' ' . $request->from . 'is equal to' .
            $converted . ' ' . $request->to,
            'amount' => $request->amount,
            'from' => $request->from,
            'to' => $request->to
        ]);
    }

    public function all() {
        $currencies = $this->currencies->withCriteria([
            new LatestFirst()
        ])->all();
        return view('currency-converter.converted_currency', ['currencies'=>$currencies]);
    }

    public function popularCurrency(){
        // Raw Sql Query
        // SELECT destination_currency, COUNT(*)
        // FROM currencies
        // Group By destination_currency
        // Order By COUNT(*) DESC
        // LIMIT 1
        $popular = CurrencyModel::select(DB::raw("count(*) as total_converted, destination_currency"))
                            ->groupBy('destination_currency')  
                            ->orderBy('total_converted','desc')
                            // ->limit(1)
                            ->first();
        return view('currency-converter.popular_currency', ['popular'=>$popular]);
    }

    public function totalConvertedInUSD() {
        // Raw Query
        // SELECT destination_currency, SUM(converted_amount)
        // FROM currencies
        // WHERE destination_currency = "USD"
        // Group By destination_currency

        $tCUSD = CurrencyModel::select(DB::raw("sum(converted_amount) as total_converted_usd, destination_currency"))
                                ->where('destination_currency', 'USD')                    
                                ->groupBy('destination_currency')
                            ->first();

        return view('currency-converter.total_converted_in_usd', ['totalConvertedUSD'=>$tCUSD]);
    }

    public function TotalConversionRequest() {
        // Raw Sql Query
        // SELECT count(id) as total_number_of_requests
        // FROM currencies
        $tCRequest = CurrencyModel::count('id');

        return view('currency-converter.total_conversion_request', ['totalConversionRequest'=>$tCRequest]);
        // dd($tCRequest);
    }

    public function findCurrency($id){
        $currency = $this->currencies->find($id);

        return $currency;
    }

    public function update(Request $request, $id){
        $currency = $this->currencies->find($id);

        $this->validate($request, [

        ]);

        $this->currencies->update([
            'amount' => $request->amount,
            'from_currency' => $request->from_currency,
            'destination_currency' => $request->destination_currency
        ]);
    }

    public function destroy($id) {
        $currency = $this->currencies->find($id);

        $this->currencies->delete();
    }
}