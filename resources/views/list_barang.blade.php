<!DOCTYPE html>
<html>
<head>
    <title>Daftar Barang</title>
</head>
<body>
    <h1>List Barang</h1>
    <ul>
        @foreach ($data as $barang)
            <li>{{ $barang['nama'] }} - Rp {{ number_format($barang['harga']) }}</li>
        @endforeach
    </ul>
</body>
</html>
