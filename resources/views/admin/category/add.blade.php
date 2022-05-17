@extends('admin.layouts.master')
@section('content')

<div class="container-fluid px-4">
  <div class="card mt-4">
    <div class="card-header">
      <h4 class="">Add Category</h4>
    </div>
    <div class="card-body">
      <form action="{{route('category.add')}}" method="post">
        <input type="hidden" name="id" value="{{ isset($category) ? $category->id : ''}}">
        @csrf
        <div class="mb-3">
          <label for="">Category Name</label>
          <input type="text" name="name"  value="{{ isset($category) ? $category->name : ''}}"   class="form-control">
        </div>
        <div class="mb-3">
          <label for="">Slug</label>
          <input type="text" name="slug" value="{{ isset($category) ? $category->slug : ''}}"  class="form-control">
        </div>
        <div class="mb-3">
          <label for="">Status</label>
          <input type="checkbox" name="satus"{{ isset($category) && $category->status == '1' ? 'checked' : ''}} type="checkbox" class="">
        </div>
        <div class="mb-3">
          <button type="submit" class="btn btn-primary">Save Category</button>
        </div>

      </form>
    </div>

  </div>

</div>

@endsection