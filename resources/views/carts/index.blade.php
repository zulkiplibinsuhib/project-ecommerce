@extends('layouts.app')
  @section('content')
    <div class="container">
      <table id="cart" class="table table-hover table-condensed" table-response>
        <thead>
          <tr>
            <th style="width:50%">Product</th>
            <th style="width:10%">Price</th>
            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>
          </tr>
        </thead>
        <tbody>
          <?php $total= 0 ?>
          @if(session('cart'))
          @foreach(session('cart') as $id =>$product)
          <?php $total += $product['price'] * $product['quantity']?>

          <tr>
            <td data-th="Product">
              <div class="row">
                <div class="col-sm-3 hidden-xs">
                  @if(!empty($product))
                  <img src="{{url('/image_files/'.$product['image_url'])}}" width="100"
                  height="100" class="imge-responsive">
                  @endif
                </div>
                  <div class="col-sm-9">
                    <h4 class="nomargin">{{ $product['name'] }}</h4>
                  </div>
              </div>
            </td>
            <td data-th="Price">{{ $product['price'] }}</td>
            <td data-th="Quantity">
              <input type="number" value="{{ $product['quantity'] }}" class="form-control quantity">
            </td>
            <td dat-th="Subtotal" class="text-center">${{ $product['price'] * $product['quantity'] }}</td>
            <td class="actions" data-th="">
              <button class="btn btn-info btn-sm update-cart" data-id="{{$id}}">Update</button>
              
            <button class="btn btn-danger btn-sm  remove-from-cart" data-id="{{ $id }}">Remove</button>

            </td>
          </tr>
          @endforeach
          @endif
        </tbody>
        <tfoot>
          <tr class="visible-xs">
            <td class="text-center"> <strong>Total {{$total}}</strong> </td>
          </tr>
          <tr>
            <td>
              <a href="{{ route('products.index') }}" class="btn btn-warning"> Lanjutan  Belanja </a>
              <a href="{{ route('admin.orders.create') }}" class="btn btn-primary"> Lanjut ke Pembayaran </i></a>
            </td>
          </tr>
        </tfoot>
      </table>
    </div>

    <!-- script jquery -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){

        // function update carts
        $(".update-cart").click(function(e){
          e.preventDefault();
          console.log('update');
          var ele = $(this);

          $.ajax({
            url: "{{ route('carts.update') }}",
            method: "patch",
            data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parents("tr").find(".quantity").val()},
            success: function(response){
              window.location.reload();
            }
          });
        });

        // function delete carts
        $(".remove-from-cart").click(function (e){
            e.preventDefault();
            var ele = $(this);

            if(confirm("Are you sure ?")) {
                $.ajax({
                    url: '{{ route('carts.remove') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function(response){
                        window.location.reload();
              }
            });
          }
        });

      });
    </script>
  @endsection
