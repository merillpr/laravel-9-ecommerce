<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @foreach($order->transactions as $transaction) 
        <p>Name : {{$transaction->product->name}}</p>
        <p>Amount : {{$transaction->amount}}</p>
        <br>
    @endforeach 

    @if(!Auth::user()->is_admin && Auth::check())
    <form action="{{route('submit_receipt', $order)}}" method="post" enctype="multipart/form-data">
        @csrf    
        <input type="file" name="payment_receipt"><br>
        <button type="submit">Submit receipt</button>
    </form>
    @endif

</body>
</html>