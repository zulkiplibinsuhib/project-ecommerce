@extends('layouts.app')

  @section('content')
    <div class="container">
      <div class="row justify-content-center">
        <div class="col">
          <h2>Tambah Gambar</h2>
          <a href="{{ route('image_insert') }}" class="btn btn-primary">Tambah Gambar</a>
          <hr>
          <br>
          @if(!empty($images))
            @foreach($images as $val)
              <div class="col-md-4" class="text-center">
                <img src="{{ url('/image_files/'.$val->image_src) }}" class="img-thumbnail" width="300">
                <b>{{ $val->image_title }}</b>
              </div>
            @endforeach
          @endif
        </div>
      </div>
    </div>
  @endsection
