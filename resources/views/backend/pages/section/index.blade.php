@extends('backend.components.master')

@section('master')
    <div class="card">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Show Section</h1>
                    @include('components.messages')
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>S.n</th>
                            <th>Section Name</th>
                            <th>Total Category </th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sectionData as $key=>$section)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$section->name}}


                                </td>
                                <td>
                                    @if($section->category->count()>0)
                                        <span class="btn btn-sm btn-primary">{{$section->category->count()}}</span>
                                    @else
                                        <span class="btn btn-sm btn-danger">No Category</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('manage-section.edit',$section->id)}}" class="btn btn-primary">Edit</a>
                                    <form action="{{route('manage-section.destroy',$section->id)}}" method="post">
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
