@extends('layouts.app')
  @section('content')
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-12">

          @foreach($products as $product)

          <div class="card border-drak mb-3" style="max-width: 18rem;">
            <div class="card-header">Details Produk</div>
            <div class="card-body text-dark">
              <h3 class="card-title"><strong>{{ $product->name }}</strong></3>
                <p class="card-text">Rp. {{ $product->price }}</p>
                <p class="card-text">{{ strip_tags($product->description) }}</p>
                <p class="card-text"> <small> {{ $product->updated_at }}</small></p>
                <a href="{{ route('public.products.index') }}" class="btn btn-primary" >Kembali</a>
              </div>
            </div>
            @endforeach

        </div>

      </div>
    </div>
  @endsection
