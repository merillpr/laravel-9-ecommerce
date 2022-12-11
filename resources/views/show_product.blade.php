<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$product->name}}</title>
</head>
<body>
        <a href="{{route('index_product')}}"><< back</a><br><br>
        <img src="{{url('storage/' . $product->image)}}" alt="" height="100px">
        <p>Nama : {{$product->name}}</p>
        <p>stock : {{$product->stock}}</p>
        <p>Rp {{$product->price}}</p>
        <p>{{$product->description}}</p>
        
        @if(Auth::check() && Auth::user()->is_admin)
        <form action="{{route('edit_product', $product)}}" method="get">
            @csrf
            <button type="submit">Edit Product</button><br><br>
        </form>
        @else
        <form action="{{route('add_to_cart', $product)}}" method="post">
            @csrf
            <label for="amount">Amount</label>
            <input type="number" name="amount" value="1">
            <button type="submit">Add to Cart</button>
        </form>
        @endif

        @if($errors->any())
        @foreach($errors->all() as $error)
        <p>{{$error}}</p>
        @endforeach
        @endif
</body>
</html>