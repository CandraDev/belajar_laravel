<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posts</title>
</head>

<body>
    @foreach ($barang as $item)
        <ul>
            <li>Id: {{ $item->id }}</li>
            <li>Nama Barang: {{ $item->nama_barang }}</li>
            <li>Merk: {{ $item->merk }}</li>
            <li>Harga: {{ $item->harga }}</li>
        </ul>
        <hr>
    @endforeach
</body>

</html>
