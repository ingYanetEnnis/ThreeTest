<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Quote extends Model
{
    use HasFactory;

    protected $table = 'quotes';
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'open',
        'high',
        'low',
        'price',
        'latest_trading_day',
        'symbols_id',
        'user_id',
    ];

    /**
     * Get the user that owns the quote.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', );
    }

    /**
     * Get the symbol that owns the quote.
     */
    public function symbol()
    {
        return $this->belongsTo(Symbol::class, 'symbols_id');
    }

    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return void
     */
    public function scopeByUser($query)
    {
        $query->where('user_id', Auth::user()->id);
    }
}
