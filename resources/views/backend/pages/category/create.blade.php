@extends('backend.components.master')

@section('master')
    <div class="card">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Add Category</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('manage-category.store') }}" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="section_id">Select Section:
                                <span class="text-danger">{{$errors->first("section_id")}}</span>

                            </label>
                            <select name="section_id" id="section_id" class="form-control">
                                <option value="">Select Section</option>
                                @foreach ($sectionData as $section)
                                    <option value="{{ $section->id }}"
                                        {{ old('section_id') == $section->id ? 'selected' : '' }}
                                    >{{ $section->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="parent_id">
                                Select Parent Category:
                                <span class="text-danger">{{$errors->first("parent_id")}}</span>
                            </label>

                            <select name="parent_id" class="form-control"
                                    id="parent_id">
                                <option value="">Select a parent category</option>
                                @foreach($categoryData as $category)
                                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                                    @if($category->child)
                                        @include('backend.pages.category.nested',['childrenData' => $category->child])
                                    @endif
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group mb-3">
                            <label for="category_name">Category Name:
                                <span class="text-danger">{{$errors->first("category_name")}}</span>

                            </label>
                            <input type="text" name="category_name"
                                   value="{{old('category_name')}}"
                                   id="category_name" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="slug">Category Slug:
                                <span class="text-danger">{{$errors->first("slug")}}</span>

                            </label>
                            <input type="text" name="slug"
                                   value="{{old('slug')}}"
                                   id="slug" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <button class="btn btn-success">Add Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
