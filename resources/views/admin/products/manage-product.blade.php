@extends('admin.layouts.master')
@section('content')
<section class="tab-components">
        <div class="container-fluid">
          <!-- ========== title-wrapper start ========== -->
          <div class="title-wrapper pt-30">
            <div class="row align-items-center">
              <div class="col-md-6">
                <div class="title mb-30">
                  <h2>New Product</h2>
                </div>
              </div>
              <!-- end col -->
              <div class="col-md-6">
                <div class="breadcrumb-wrapper mb-30">
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                        <a href="#0">Dashboard</a>
                      </li>
                      <li class="breadcrumb-item"><a href="#0">Products</a></li>
                      <li class="breadcrumb-item active" aria-current="page">
                        New Product
                      </li>
                    </ol>
                  </nav>
                </div>
              </div>
              <!-- end col -->
            </div>
            <!-- end row -->
          </div>
          <!-- ========== title-wrapper end ========== -->

          <!-- ========== form-elements-wrapper start ========== -->
          <div class="form-elements-wrapper">
              <form action="{{ route('products.store-product') }}" method="post" enctype="multipart/form-data">
                  @csrf

                  <input type="hidden" name="id" value="{{ isset($product) ? $product->id : '' }}">
                <div class="row">
                <div class="col-lg-6">
                    <!-- input style start -->
                    <div class="card-style mb-30">
                    <h6 class="mb-25">Product Details</h6>

                    <div class="select-style-1">
                        <label>Category  </label>
                        <div class="select-position">
                        <select name="category">
                            <option value="">Select category</option>
                            @if(isset($categories))
                              @foreach($categories as $category)
                                <option {{ isset($product) && $product->category == $category->id ? 'selected': '' }} value="{{$category->id}}">{{$category->name}}</option>                                                            {{$category->name}}</option>
                              @endforeach
                            @endif
                        </select>
                        </div>
                    </div>

                    <div class="input-style-1">
                        <label>Title</label>
                        <input type="text" name="name" value="{{ isset($product) ? $product->name : ''}}" placeholder="Product title">
                    </div>
                    
                    <!-- end input -->
                    <label>Selling price</label>
                    <div class="input-style-3">
                        <input type="text" name="price" value="{{ isset($product) ? $product->price : ''}}" placeholder="Price">
                        <span class="icon"><i class="lni lni-rupee"></i></span>
                    </div>

                    <label> Discount</label>
                    <div class="input-style-3">
                        <input type="text" name="product_discount" value="{{ isset($product) ? $product->product_discount : ''}}" placeholder="Discount">
                        <span class="icon"><i class="fa-solid fa-percent"></i></span>
                    </div>
                    <!-- end input -->

                    <label>Status</lable>
                    <div class="form-check form-switch toggle-switch mb-30">
                        <input class="form-check-input" name="status" {{ isset($product) && $product->status == '1' ? 'checked' : ''}} type="checkbox" id="toggleSwitch1">
                        <label class="form-check-label" for="toggleSwitch1">Make the product visible to user by switching on.</label>
                    </div>
                    
                    </div>
                    <!-- end card -->
                    <!-- ======= input style end ======= -->
                </div>
                <!-- end col -->
                <div class="col-lg-6">
                    <!-- ======= textarea style start ======= -->
                    <div class="card-style mb-30">
                    <h6 class="mb-25"></h6>
                    <div class="input-style-1">
                        <label>Product description</label>
                        <textarea name="description" placeholder="Product description" rows="2">{{ isset($product) ? $product->description : ''}}</textarea>
                    </div>
                    
                    <div class="mb-3">
                       <label for="formFile" class="form-label">Product image</label>
                            <input name="file[]" class="form-control" type="file" id="formFile" multiple><br>
                           
                            <div class="row">
                              @if(isset($product))
                              @php
                              $images = \App\Models\Media::where("product_id", $product->id)->get();
                              @endphp
                              @if($images->count())
                              @foreach($images as $image)
                                <div class="col-sm-3">
                                  <img class="img-fluid w-60"   src="/{{ $image->file_name }}" alt="">
                                  <a href="{{ route('image.delete', $image['id']) }}">
                                    <i class="lni lni-trash-can"></i>
                                  </a>
                                </div>
                                @endforeach
                              @endif
                              @endif
                            
                            </div>
                            
                        </div>

                        <button type="submit" class="main-btn primary-btn square-btn btn-hover"> Save </button>
                    </div>
                    <!-- ======= textarea style end ======= -->
                </div>
                <!-- end col -->
                </div>
            <!-- end row -->
            </form>
          </div>
          <!-- ========== form-elements-wrapper end ========== -->
        </div>
        <!-- end container -->
      </section>
@endsection