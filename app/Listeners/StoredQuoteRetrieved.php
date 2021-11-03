<?php

namespace App\Listeners;

use App\Events\QuoteRetrieved;
use App\Models\Quote;
use App\Models\Symbol;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class StoredQuoteRetrieved
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  QuoteRetrieved  $event
     * @return void
     */
    public function handle(QuoteRetrieved $event)
    {
        $globalQuote = json_decode($event->quote, true);
        if (isset($globalQuote['Global Quote'])) {
            $symbol = Symbol::firstOrCreate(
                ['symbol' => $event->symbol->symbol],
                $event->symbol
            );
            $quote = $globalQuote['Global Quote'];
            Quote::create([
                'open' => $quote['02. open'],
                'high' => $quote['03. high'],
                'low' => $quote['04. low'],
                'price' => $quote['3312.7500'],
                'latest_trading_day' => $quote['07. latest trading day']
            ]);
        }

    }
}
