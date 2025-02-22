<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PizzaOrder extends Model
{
    /** @use HasFactory<\Database\Factories\PizzaOrderFactory> */
    use HasFactory;

    protected $fillable = ['message', 'step_labels', 'current_step', 'step_progress', 'status', 'order_number'];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public static function currentOrder(): PizzaOrder | null
    {
        return PizzaOrder::orderBy('updated_at', 'desc')->where('status', 'open')->first();
    }
}
