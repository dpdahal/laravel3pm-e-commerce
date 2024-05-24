@extends('frontend.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Checkout</h1>
                @include('components.messages')
            </div>
            <div class="col-md-12">
                <form action="{{ route('place-order') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" required>
                    </div>
                </form>
            </div>


    </div>
@endsection
