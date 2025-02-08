<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePizzaOrderRequest;
use App\Http\Resources\V1\PizzaOrderCollection;
use App\Http\Resources\V1\PizzaOrderResource;
use App\Models\PizzaOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ApiV1PizzaOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): PizzaOrderCollection
    {
        $chirps = PizzaOrder::with('user')->latest()->paginate(10);

        return new PizzaOrderCollection($chirps);
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
    public function store(StorePizzaOrderRequest $request): PizzaOrderResource
    {
        Gate::authorize('create', PizzaOrder::class);

        $validated = $request->validated();

        $order = $request->user()->orders()->create($validated);

        return new PizzaOrderResource($order);
    }

    /**
     * Display the specified resource.
     */
    public function show(PizzaOrder $order): PizzaOrderResource
    {
        Gate::authorize('view', $order);
        return new PizzaOrderResource($order);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PizzaOrder $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePizzaOrderRequest $request, PizzaOrder $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PizzaOrder $order)
    {
        //
    }
}
