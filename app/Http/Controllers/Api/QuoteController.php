<?php


namespace App\Http\Controllers\Api;


use App\Http\Resources\QuoteResource;

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
        $quotes = Quote::with('symbol')->byUser()->get();

        return $this->sendResponse($quotes);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function quoteBySymbol(Request $request, AphavantageServiceApi $api)
    {
        $symbol = json_decode($request->request->get('symbol'), true);

        $globalQuote = $api->latestPrice($symbol);
        $response = null;
        if (isset($globalQuote['Global Quote'])) {
            $symbol = Symbol::firstOrCreate(
                ['symbol' => $symbol['symbol']],
                $symbol
            );

            $quote = $globalQuote['Global Quote'];
            $response = Quote::create([
                'open' => $quote['02. open'],
                'high' => $quote['03. high'],
                'low' => $quote['04. low'],
                'price' => $quote['05. price'],
                'latest_trading_day' => $quote['07. latest trading day'],
                'symbol_id' => $symbol->id,
                'user_id' => Auth::user()->id
            ]);
            $response['symbol'] = $symbol->toArray();
        }
        return $this->sendResponse($response);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function symbols($match, AphavantageServiceApi $api)
    {
        return $this->sendResponse($api->matchSymbols($match));
    }
}
