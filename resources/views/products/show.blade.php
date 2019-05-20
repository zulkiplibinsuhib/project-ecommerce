<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <img src="{{ url('/image_files/'.$product->image_url)  }}" alt="..." class="card-img-top">
        </div>
        <div class="col-md-9">
            <h3>
                {{ $product->name }}
            </h3>
            <h4>
               Rp. {{ number_format($product->price ,2)  }}
       
            </h4>
            <!-- rating -->
            @for($i = 1; $i<=5; $i++)
                @if($i <= $rating)
                <span class="fa fa-star checked"></span>
                @else
                <span class="fa fa-star"></span>
                @endif
            @endfor

            <div class="mt-4">
                <a href="{{ route('carts.add', ['id' => $product['id']]) }}" class="btn btn-primary">Beli</a>
            </div>
            
            <div class="mt-2">
                <a href="https:://www.facebook.com/sharer/sharer.php?u={{ route('products.show', ['id' => $product['id']]) }}" class="social-button" target="_blank">
                    Share Facebook
                </a> |
                <a href="https:://www.twitter.com/intent/tweet?text=my share text&amp;url={{ route('products.show', ['id' => $product['id']]) }}" class="social-button" target="_blank">
                    Share Twitter
                </a> |
                <a href="https:://www.linkedin.com/shareArticle?mini=true&amp;url={{ route('products.show', ['id' => $product['id']]) }}&amp;title=my share text&amp;summary=dit is de linedin summary" class="social-button" target="_blank">
                    Share Linkedin
                </a> |
                <a href="https:://www.wa.me/?text={{ route('products.show', ['id' => $product['id']]) }}" class="social-button" target="_blank">
                    Share Whatsapp
                </a>
            </div>
            
            <div class="mt-4">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a href="#description" class="nav-link active" role="tab" data-toggle="tab">Deskripsi</a>
                    </li>
                    <li class="nav-item">
                        <a href="#review" class="nav-link" role="tab" data-toggle="tab">Review</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content mt-2">
                    <div class="tab-pane fade in active show" id="description" role="tabpanel">
                        {!! $product->description !!}
                    </div>
                    <div class="tab-pane fade" role="tabpanel" id="review">
                        <form action="{{ route('products.store', ['id' => $product->id]) }}" method="POST">
                        @csrf
                            <div class="form-group">
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <label>Rating</label><br>
                                <!-- rating radio -->
                                <input type="radio" name="rating" value="1">1 <br> 
                                <input type="radio" name="rating" value="2">2 <br>
                                <input type="radio" name="rating" value="3">3 <br>
                                <input type="radio" name="rating" value="4">4 <br>
                                <input type="radio" name="rating" value="5">5 <br>
                                <div class="form-group">
                                <br/>
                                    <label>Komentar</label>
                                    <textarea name="description" class="form-control" rows="3" placeholder="Deskripsi" id="ckview"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                        <div>
                        <h3>Semua Komentar</h3> <br/>
                        @foreach($reviews as $review)
                        {{ $review->user->name }}
                        : <label>{!! $review->description !!}</label><br/>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script src="{{ url('plugins\tinymce\jquery.tinymce.min.js') }}"></script>
<script src="{{ url('plugins\tinymce\tinymce.min.js') }}"></script>
<style>
.checked {
  color: orange;
}
</style>
<!-- tinymce js -->
<script>
tinymce.init({ selector:'#ckview' });
</script>