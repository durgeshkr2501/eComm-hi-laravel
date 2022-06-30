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
          <div class="col-md-6 col-sm-6 col-xs-12">
          <input type="text" name="name"  value="{{ isset($category) ? $category->name : ''}}"   class="form-control col-md-7 col-xs-12 ">
         
        </div>
        </div>
        
        <div class="mb-3">
          <label for="">Sub Category Of <span class="required">*</span></label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <select  name="category_id" id="" class="form-control col-md-7 col-xs-12">
              <option value="">No Subcategory</option>
              @if(isset($categories))
              @foreach($categories as $_category)
              <option value="{{$_category->id}}" @if(isset($category) && $category->category_id==$_category->id) selected @endif>
              {{$_category->name}}</option>
              @endforeach
              @endif
            </select>
          </div>
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