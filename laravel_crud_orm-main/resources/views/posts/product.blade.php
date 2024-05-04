

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>List Produk</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Stok</th>
                <th>Berat</th>
                <th>Harga</th>
                <th>Kondisi</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $product->nama }}</td>
                <td>{{ $product->stok }}</td>
                <td>{{ $product->berat }}</td>
                <td>{{ $product->harga }}</td>
                <td>
                    @if ($product->kondisi == 'baru')
                    <span class="badge bg-success">Baru</span>
                    @else
                    <span class="badge bg-warning">Bekas</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('products.create') }}" class="btn btn-success">Tambah Produk</a>
    <a href="{{ route('home') }}" class="btn btn-primary">Kembali ke Produk</a>
</div>
@endsection
