<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit {{$product->name}}</title>
</head>
<body>
    <form action="{{route('update_product', $product)}}" method="post" enctype="multipart/form-data">
        @Method('patch')
        @csrf
        <input type="text" name="name" value="{{$product->name}}"><br><br>
        <input type="number" name="price" value="{{$product->price}}"><br><br>
        <input type="text" name="description" value="{{$product->description}}"><br><br>
        <input type="file" name="image"><br><br>
        <input type="number" name="stock" value="{{$product->stock}}"><br><br>
        <button type="submit">Update Data Product</button><br><br>
    </form>
</body>
</html>