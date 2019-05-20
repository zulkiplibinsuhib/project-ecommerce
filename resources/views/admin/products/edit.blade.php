@extends('layouts.app')
  @section('content')
    <div class="container">
      <div class="row justify-content-center">
        <div class="col">
          <h2>Edit Produk</h2>
          <br>

          @foreach($products as $product)
          <form action="{{ route('admin.products.update', $product['id']) }}" method="post">
            {{ csrf_field() }}
            @method('PATCH')

            <div class="form-group">
              <label>Nama Produk</label>
              <input type="text" name="name" class="form-control" placeholder="Nama Produk" value="{{ $product['name'] }}" required>
            </div>

            <div class="form-group">
              <label>Harga</label>
              <input type="number" name="price" class="form-control" placeholder="Harga Produk" value="{{ $product['price'] }}" required>
            </div>

            <div class="form-group">
              <label>Deskripsi</label>
              <textarea name="description" class="form-control" rows="3" id="ckview" placeholder="Deskripsi" required>{{ $product['description'] }}</textarea>
            </div>
            <a href="{{ route('admin.products.index') }}" class="btn btn-dark">Back</a>
            <button type="submit" class="btn btn-primary" name="button">Submit</button>
          </form>
          @endforeach

        </div>
      </div>
    </div>
  @endsection

<script type="text/javascript" src="{{ url ('plugins/tinymce/jquery.tinymce.min.js') }}"></script>
<script type="text/javascript" src="{{ url ('plugins/tinymce/tinymce.min.js') }}"></script>
<script type="text/javascript">tinymce.init({ selector:'#ckview'})</script>
