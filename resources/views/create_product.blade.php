<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
</head>
<body>
    <form action="{{route('store_product')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" placeholder="Name"><br><br>
        <input type="number" name="price" placeholder="Price"><br><br>
        <input type="text" name="description" placeholder="Description"><br><br>
        <input type="file" name="image" placeholder="Image"><br><br>
        <input type="number" name="stock" placeholder="Stock"><br><br>
        <button type="submit">Simpan Data Product</button><br><br>
    </form>
</body>
</html>