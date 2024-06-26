@extends('frontend.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Cart List</h1>
                @include('components.messages')
            </div>
            <div class="col-md-12">
                <table id="cart" class="table table-hover table-condensed">
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
                    @php $total = 0 @endphp
                    @if(session('cart'))
                        @foreach(session('cart') as $id => $details)
                            @php $total += $details['price'] * $details['quantity'] @endphp
                            <tr data-id="{{ $id }}">
                                <td data-th="Product">
                                    <div class="row">
                                        <div class="col-sm-3 hidden-xs"><img src="{{ $details['image'] }}" width="100" height="100" class="img-responsive"/></div>
                                        <div class="col-sm-9">
                                            <h4 class="nomargin">{{ $details['name'] }}</h4>
                                        </div>
                                    </div>
                                </td>
                                <td data-th="Price">${{ $details['price'] }}</td>
                                <td data-th="Quantity">
                                    <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity update-cart" />
                                </td>
                                <td data-th="Subtotal" class="text-center">${{ $details['price'] * $details['quantity'] }}</td>
                                <td class="actions" data-th="">
                                    <a href="{{route('remove-from-cart',$id)}}" class="btn btn-danger btn-sm remove-from-cart">Remove</a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="5" class="text-right"><h3><strong>Total ${{ $total }}</strong></h3></td>
                    </tr>
                    <tr>
                        <td colspan="5" class="text-right">
                            <a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a>
                            <form action="{{route('order')}}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-success">Checkout</button>
                            </form>

                           <button onclick="paymentGetWay()">Pay Khalti</button>
                        </td>
                    </tr>
                    </tfoot>
                </table>

            </div>
        </div>

  <script>

      function paymentGetWay(){
          let url ="{{route('payment')}}";
          fetch(url,{
              method:'GET',
              headers:{
                  'Content-Type':'application/json',
                  'Accept':'application/json'
              }
          }).then(response=>{
              return response.json();
          }).then(data=>{
             let url = data.payment_url;
                window.location.href = url;
          }).catch(error=>{
              console.log(error);
          });

      }



  </script>

@endsection
