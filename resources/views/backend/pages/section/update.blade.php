@extends('backend.components.master')

@section('master')
    <div class="card">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Update Section</h1>
                </div>
                <div class="col-md-12">
                    <form action="{{route('manage-section.update',$section->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-2">
                            <label for="name">Section Name:
                                <span class="text-danger">{{$errors->first("name")}}</span>
                            </label>
                            <input type="text" class="form-control"
                                   value="{{$section->name}}"
                                   id="name" name="name">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success">Update Section</button>
                        </div>
                    </form>
                </div>
            </div>
@endsection
