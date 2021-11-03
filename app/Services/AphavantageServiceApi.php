<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Events\QuoteRetrieved;

class AphavantageServiceApi
{

    private $uri;
    private $apiKey;

    public function __construct($uri, $apiKey) {
        $this->uri = $uri;
        $this->apiKey = $apiKey;
    }

    public function latestPrice($symbol){

        $quote = Http::get($this->uri, ['function' => 'GLOBAL_QUOTE', 'symbol'=> $symbol->symbol, 'apikey' => $this->apiKey])->body();
       // QuoteRetrieved::dispatch($symbol, $quote);
        return $quote;
    }

    public function matchSymbols($match){
        return Http::get($this->uri, ['function' => 'SYMBOL_SEARCH', 'keywords'=> $match, 'apikey' => $this->apiKey])->body();
    }
}
