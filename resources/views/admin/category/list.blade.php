@extends('admin.layouts.master')
@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card-style mb-30">
      <div class="row">
        <div class="col-sm-6">
          <h6 class="mb-10">Category Table</h6>
        </div>
        <div class="col-sm-6">
          <a href="{{route('category.add')}}" style="float:right;" class="btn btn-block btn-primary">Add Category</a>
        </div>

      </div>
      <div class="table-wrapper table-responsive">
        <table class="table">
          <thead>
            <tr>


              <th>
                <h6>Name</h6>
              </th>
              <th>
                <h6>Parent Category Name</h6>
              </th>
              <th>
                <h6>Created_Date</h6>
              </th>
              <th>
                <h6>Status</h6>
              </th>
              <th>
                <h6>Action</h6>
              </th>


            </tr>
            <!-- end table row-->
          </thead>
          <tbody>
            @foreach($categories as $key => $category)
            <tr>

              <td class="min-width">
                <p>{{ $category['name'] }}</p>
              </td>

              <td class="min-width">
                @if($category->category_id)
                {{!is_null($category->parent) ? $category->parent->name : ''}}
                @else
                No Parent Category
                @endif
              </td>

              <td class="min-width">
                <p>{{$category['created_at']}}</p>
              </td>

              <td class="min-width">
                @if($category->status == '1')
                <a href="{{route('product.status-update',$category['id'])}}" class="btn btn-success">Active</a>
                @else
                <a href="{{route('product.status-update',$category['id'])}}" class="btn btn-danger">Inactive</a>
                @endif
              </td>

              <td>
                <div class="action">
                  <a href="{{route('category.delete',$category['id'])}} ">
                    <i class="lni lni-trash-can"></i>
                  </a>

                  <a href="{{ route('category.edit',$category['id'])}}" class="text-info">
                    <i class="lni lni-pencil"></i>
                  </a>
                </div>
              </td>
              @endforeach
              <!-- end table row -->

          </tbody>
        </table>
        <!-- end table -->
      </div>
    </div>
    <!-- end card -->
  </div>
  <!-- end col -->
</div>
@endsection