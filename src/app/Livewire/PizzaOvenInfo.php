<?php

namespace App\Livewire;

use App\Models\PizzaOrder;
use Livewire\Component;

class PizzaOvenInfo extends Component
{
    public $order;
    public $lastOrder;


    public function render()
    {
        return view('livewire.pizza-oven-info', ['order' => $this->order, 'lastOrder' => $this->lastOrder]);
    }

    public function updateInfo(): void
    {
        $this->order = PizzaOrder::currentOrder();
        $this->lastOrder = PizzaOrder::lastCompletedOrder();
    }
}
