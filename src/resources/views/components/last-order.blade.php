@props(['lastOrder'])


@if($lastOrder !== null)
    <div>
        <p>{{$lastOrder->order_number}}</p>
    </div>
@endif
