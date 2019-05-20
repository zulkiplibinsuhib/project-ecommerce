@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <h2>Detail Barang</h2>
            <a href="{{ route('admin.products.index') }}" class="btn btn-primary">Kembali</a></a>
            <hr>
                 <div class="table-responsive">
                    <table class="table table-stripped table-sm">
                        <thead>
                            <th>#</th>
                            <th>Nama Produk</th>
                            <th>Harga Produk</th>
                            <th>Gambar Produk</th>
                            <th>Deskripsi Produk</th>
                        </thead>
                        <?php $no = 1 ?>
                        <tbody>
                            <td>{{ $no++ }}</td>
                            <td>{{ $products->name }}</td>
                            <td>Rp. {{ number_format($products->price, 2) }}</td>
                            <td>
                                    <img src="{{ url('image_files/'.$products->image_url) }}" class="img-thumbnail" width="300">

                            </td>
                            <td>{{ strip_tags($products->description) }}</td>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
