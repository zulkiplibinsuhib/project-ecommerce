@extends('layouts.app')
  @section('content')
    <div class="container">
      <div class="row justify-content-center">
        <div class="col">
          <h2>Tambah Produk</h2>
          <br>

          <form action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group">
              <label>Nama Produk</label>
              <input type="text" name="name" class="form-control" placeholder="Nama Produk" required>
            </div>

            <div class="form-group">
              <label>Harga</label>
              <input type="text" name="price" class="form-control" placeholder="Harga Produk" required>
            </div>

            <div class="form-group">
              <input type="file" name="image_url" class="form-control">
            </div>

            <div class="form-group">
              <label>Deskripsi</label>
              <textarea type="textarea" name="description" class="form-control" id="ckview" rows="3" placeholder="Deskripsi" novalidate></textarea>
            </div>

            <a href="{{ route('admin.products.index') }}" class="btn btn-dark">Back</a>
            <button type="submit" class="btn btn-primary" >Submit </button>
          </form>
        </div>
      </div>
    </div>
  @endsection

<script type="text/javascript" src="{{ url ('plugins/tinymce/jquery.tinymce.min.js') }}"></script>
<script type="text/javascript" src="{{ url ('plugins/tinymce/tinymce.min.js') }}"></script>
<script type="text/javascript">tinymce.init({ selector:'#ckview'})</script>
