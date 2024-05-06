@extends('backend.components.master')

@section('master')
    <div class="card">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>User List</h1>
                </div>
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Gender</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($usersData as $user)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->gender}}</td>
                                <td>{{$user->role}}</td>
                                <td>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
@endsection
