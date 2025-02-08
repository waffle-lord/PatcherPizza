<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePizzaOrderRequest;
use App\Http\Requests\UpdatePizzaOrderRequest;
use App\Models\PizzaOrder;
use Illuminate\View\View;

class PizzaOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $order = PizzaOrder::currentOrder();
        return view('pizza-oven', ['order' => $order]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePizzaOrderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PizzaOrder $pizzaOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PizzaOrder $pizzaOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePizzaOrderRequest $request, PizzaOrder $pizzaOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PizzaOrder $pizzaOrder)
    {
        //
    }
}
