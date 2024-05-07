@extends('backend.components.master')

@section('master')
    <div class="card">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Add Section</h1>
                </div>
                <div class="col-md-12">
                    <form action="{{route('manage-section.store')}}" method="POST">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="name">Section Name:
                            <span class="text-danger">{{$errors->first("name")}}</span>
                            </label>
                            <input type="text" class="form-control"
                                   value="{{old('name')}}"
                                   id="name" name="name">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success">Add Section</button>
                        </div>
                    </form>
                </div>
            </div>
@endsection
