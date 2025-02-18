<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PizzaOrder extends Model
{
    /** @use HasFactory<\Database\Factories\PizzaOrderFactory> */
    use HasFactory;

    protected $casts = ['open' => 'boolean'];
    
    protected $fillable = ['message', 'progress', 'open', 'order_number'];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public static function currentOrder(): PizzaOrder | null
    {
        return PizzaOrder::orderBy('updated_at', 'desc')->where('open', true)->first();
    }
}
