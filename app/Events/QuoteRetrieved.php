<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Http\Client\Events\ResponseReceived;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Event;

class QuoteRetrieved
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $symbol;
    public $quote;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($symbol, $quote)
    {
        $this->symbol =  $symbol;
        $this->quote =  $quote;
    }


    /**
     * Register any other events for your application.
     *
     * @return void
     */
    public function boot()
    {

    }
}
