<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    ];

    /**
     * Get the user that owns the phone.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', );
    }

    /**
     * Get the user that owns the phone.
     */
    public function symbol()
    {
        return $this->belongsTo(Symbol::class, 'symbols_id', );
    }
}
