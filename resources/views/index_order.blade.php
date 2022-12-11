<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OrdersDocument</title>
</head>
<body>
    @php
        $total_harga = 0;
    @endphp

    @foreach($orders as $order)
        @if(Auth::check() && !Auth::user()->is_admin)
            <form action="{{route('show_order', $order)}}" method="get">
                @csrf
                <button type="submit">Order id : {{$order->id}}</button>
            </form>
        @else
            <p>Order id : {{$order->id}}</p>
        @endif

        @foreach($order->transactions as $transaction)
            @php
                $total_harga += $transaction->product->price * $transaction->amount;
            @endphp
        @endforeach
        @if($total_harga != 0)
            <p>Total Harga : {{$total_harga}}</p>
            @php
                $total_harga = 0;
            @endphp
        @endif
        @if($order->is_paid)
            <p>Paid</p>
        @else
            <p>Unpaid</p>
            @if($order->payment_receipt && Auth::user()->is_admin)
                <form action="{{route('confirm_payment', $order)}}" method="post">
                    @csrf
                    <button type="submit">Confirm Payment</button>
                </form>
            @endif
        @endif
        <br>
    @endforeach
</body>
</html>