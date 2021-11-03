<?php


namespace App\Http\Controllers\Api;


use App\Models\Quote;
use App\Models\Symbol;
use App\Services\AphavantageServiceApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuoteController extends BaseApiController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quotes = Quote::all();
        return $this->sendResponse($quotes, 'Products retrieved successfully.');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function quoteBySymbol(Request $request, AphavantageServiceApi $api)
    {
        $globalQuote = $api->latestPrice($request->symbol);
        if (isset($globalQuote['Global Quote'])) {
            $symbol = Symbol::firstOrCreate(
                ['symbol' => $request->symbol->symbol],
                $request->symbol
            );
            $quote = $globalQuote['Global Quote'];
            $newQuote = Quote::create([
                'open' => $quote['02. open'],
                'high' => $quote['03. high'],
                'low' => $quote['04. low'],
                'price' => $quote['3312.7500'],
                'latest_trading_day' => $quote['07. latest trading day']
            ]);
            $newQuote->user()->associate(Auth::user());
            $newQuote->symbol()->associate($symbol);

        }
        return $this->sendResponse($newQuote->toArray(), 'Products retrieved successfully.');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function symbols($match, AphavantageServiceApi $api)
    {
        return $this->sendResponse($api->matchSymbols($match), 'Products retrieved successfully.');
    }
}
