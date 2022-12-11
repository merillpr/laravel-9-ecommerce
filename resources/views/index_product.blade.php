<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
</head>
<body>
    @foreach($products as $product) 
        <p>{{$product->name}}</p>
        <img src="{{url('storage/' . $product->image)}}" alt="" height="100px">
        <form action="{{route('show_product', $product)}}" method="get">
            <button type="submit">Show Detail</button>
        </form>

        @if(Auth::user()->is_admin && Auth::check())
        <form action="{{route('delete_product', $product)}}" method="post">
            @csrf 
            @Method('delete')
            <button type="submit">Delete Product</button>
        </form>
        @endif

        <br><br>
    @endforeach
</body>
</html>