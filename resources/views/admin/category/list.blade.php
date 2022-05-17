@extends('admin.layouts.master')
@section('content')
<div class="row">
              <div class="col-lg-12">
                <div class="card-style mb-30">
                  <h6 class="mb-10">Category Table</h6>
                  
                  <div class="table-wrapper table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          
                       
                          <th><h6>Name</h6></th>
                          <th><h6>Slug</h6></th>
                          <th><h6>Created_Date</h6></th>
                          <th><h6>Status</h6></th>
                          <th><h6>Action</h6></th>
                          
                          
                        </tr>
                        <!-- end table row-->
                      </thead>
                      <tbody>
                      @foreach($categories as $key => $item)
                        <tr>
                          
                          <td class="min-width">
                            <p>{{ $item['name'] }}</p>
                          </td>
                          
                          <td class="min-width">
                            <p>{{$item['slug']}}</p>
                          </td>

                          <td class="min-width">
                            <p>{{$item['created_at']}}</p>
                          </td>
                          
                          <td class="min-width">
                        @if($item->status == '1')
                        <a href="{{route('product.status-update',$item['id'])}}" class="btn btn-success">Active</a>
                        @else
                        <a href="{{route('product.status-update',$item['id'])}}" class="btn btn-danger">Inactive</a>
                        @endif
                          </td>
                         
                          <td>
                            <div class="action">
                              <a href="{{ route('category.delete', $item['id']) }}">
                                <i class="lni lni-trash-can"></i>
                                </a>

                              <a href="{{ route('category.edit', $item['id'])}}" class="text-info">
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