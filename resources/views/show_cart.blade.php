<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @if($errors->any())
    @foreach($errors->all() as $error)
    <p>{{$error}}</p>
    @endforeach
    @endif

    @php
        $total_harga = 0;
    @endphp

    @foreach($carts as $cart) 
        <img src="{{url('storage/' . $cart->product->image)}}" alt="" height="100px">
        <p>Name : {{$cart->product->name}}</p>
        <form action="{{route('update_cart', $cart)}}" method="post">
            @Method('patch')
            @csrf
            <input type="number" name="amount" value="{{$cart->amount}}">
            <button type="submit">Update Amount</button>
        </form>
        <form action="{{route('delete_cart', $cart)}}" method="post">
            @Method('delete')
            @csrf
            <button type="submit">Delete from Cart</button>
        </form>
        @php
            $total_harga += $cart->product->price * $cart->amount;
        @endphp
    @endforeach
    @if($total_harga != 0)
        <br><br>
        <p>Total Harga : {{$total_harga}}</p>
    @endif 
    <form action="{{route('checkout')}}" method="post">
        @csrf
        <button type="submit">checkout</button>
    </form>
</body>
</html>