@extends('backend.components.master')

@section('master')
    <div class="card">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Show Category</h1>
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>S.n</th>
                            <th>Section Name</th>
                            <th>Category Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categoryData as $key=>$category)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$category->section->name}}</td>
                                <td>{{$category->category_name}}</td>
                                <td>
                                    <a href="{{route('manage-category.edit',$category->id)}}" class="btn btn-primary">Edit</a>
                                    <form action="{{route('manage-category.destroy',$category->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger"
                                        onclick="return confirm('Are you sure')"
                                        >Delete</button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
@endsection
