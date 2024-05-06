@extends('backend.components.master')

@section('master')
    <div class="card">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>My Profile</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <table>
                        <tbody>
                        <tr>
                            <th>Name</th>
                            <td>{{Auth::user()->name}}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{Auth::user()->email}}</td>
                        </tr>
                        <tr>
                            <th>Role</th>
                            <td>{{Auth::user()->role}}</td>
                        </tr>
                        <tr>
                            <th>Gender</th>
                            <td>{{Auth::user()->gender}}</td>
                        </tr>
                        <tr>
                            <th>Created At</th>
                            <td>{{Auth::user()->created_at}}</td>
                        </tr>


                        </tbody>
                    </table>
                </div>
                <div class="col-md-4">
                    @if(Auth::user()->image)
                        <img src="{{url('users/'.Auth::user()->image)}}" alt="">
                    @else
                       @include('backend.components.image-not-found')
                    @endif

                </div>
            </div>
        </div>
@endsection
