@extends('admin.layouts.master')
@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card-style mb-30">
      <div class="row">
        <div class="col-sm-6">
          <h6 class="mb-10">Product Table</h6>
        </div>
        <div class="col-sm-6">
          <a href="{{ route('products.store-product') }}" style= "float:right;" class="btn btn-block btn-primary">Add Product</a>
        </div>
      </div>
      <div class="table-wrapper table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>
                <h6>Image</h6>
              </th>
              <th>
                <h6 style="margin-left:50px;">Name</h6>
              </th>
              <th>
                <h6>Price</h6>
              </th>
              <th>
                <h6>Category</h6>
              </th>
              <th>
                <h6 style="margin-left:20px;">Status</h6>
              </th>
              <th>
                <h6 style="margin-left:20px;">Discount</h6>
              </th>
              <th>
                <h6>Action</h6>
              </th>
              
            </tr>
            <!-- end table row-->
          </thead>
          <tbody>
            @foreach($products as $key => $item)
            <tr>
              <td>

                <img class="img-fluid w-60" style="height: 50px;" src="/{{$item['gallery']}}" alt="">

              </td>
              <td class="min-width">
                <p style="margin-left:50px;">{{ $item['name'] }}</p>
              </td>
              <td class="min-width">
                <p><i class="fas fa-rupee-sign"></i>{{ number_format($item['price'], 2) }}</p>
              </td>
              <td class="min-width">
                <p>{{ $item->_category ? $item->_category['name'] : '' }}</p>
              </td>

              <td class="min-width">
                @if($item->status == '1')
                <a href="{{route('product.status-update',$item['id'])}}" class="btn btn-sm btn-success">Active</a>
                @else
                <a href="{{route('product.status-update',$item['id'])}}" class="btn btn-sm btn-danger">Inactive</a>
                @endif
              </td>
              <td>
              <p style="margin-left:30px;">{{($item['product_discount'])}}</p>
              </td>
              <td>
                <div class="action" style="margin-left:10px;">
                  <a href="{{ route('product.delete', $item['id']) }}">
                    <i class="lni lni-trash-can"></i>
                  </a>

                  <a href="{{ route('product.edit', $item['id']) }}" class="text-info">
                    <i class="lni lni-pencil"></i>
                  </a>
                </div>
              </td>
              
            </tr>
            @endforeach
            <!-- end table row -->

          </tbody>
        </table>
        {{ $products->onEachSide(5)->links() }}
        <!-- end table -->
      </div>
    </div>
    <!-- end card -->
  </div>
  <!-- end col -->
</div>
@endsection