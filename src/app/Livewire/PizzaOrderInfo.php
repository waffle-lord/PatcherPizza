<?php

namespace App\Livewire;

use App\Models\PizzaOrder;
use Livewire\Component;

class PizzaOrderInfo extends Component
{
    public PizzaOrder $order;

    public function render()
    {
        return view('livewire.pizza-order-info');
    }
}
