@extends('backend.components.master')

@section('master')
    <div class="card ">
        <div class="container p-4">
            <div class="row">
                <div class="col-md-12">
                    <h1>Orders</h1>
                    @include('components.messages')
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Customer Name</th>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Product Quantity</th>
                            <th>Total Price</th>
                            <th>Order Date</th>
                            <th>Order Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{$order->id}}</td>
                                <td>{{$order->user->name}}</td>
                                <td>{{$order->product_name}}</td>
                                <td>{{$order->product_price}}</td>
                                <td>{{$order->quantity}}</td>
                                <td>{{$order->total_price}}</td>
                                <td>{{$order->created_at}}</td>
                                <td>
                                    @if($order->status == 'pending')
                                        <span class="text-danger">{{$order->status}}</span>
                                    @else
                                        <span class="text-success">{{$order->status}}</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
