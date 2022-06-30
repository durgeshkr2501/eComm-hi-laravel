<!-- Products Start -->

<div class="container-fluid pt-5">


  <div class="text-center mb-4">
    <h2 class="section-title px-5"><span class="px-2">Trandy Products</span></h2>
  </div>
  <div class="row px-xl-5 pb-3">
    @foreach($products as $key => $item)
    <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
      <div class="card product-item border-0 mb-4">
        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-2">
          <img class="img-fluid w-150" style="height: 200px;" src="/{{$item['gallery']}}" alt="">
        </div>
        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
          <h6 class="text-truncate mb-3">{{ $item['name'] }}</h6>


          <div class="d-flex justify-content-center">
           

           
            @if($item['discounted_price'] > 0)
              <h6><i class="fas fa-rupee-sign"></i>{{  number_format($item['discounted_price'],2) }}</h6>
            @else
              <h6><i class="fas fa-rupee-sign"></i>{{ $item['price'] }}</h6>
            @endif

            <h6 class="text-muted ml-2"><del><i class="fas fa-rupee-sign"></i>{{ number_format($item['price'], 2) }}</del></h6>
            <span class="percentage_discount">{{($item['product_discount'])}}% off</span>
          </div>
        </div>
        <div class="card-footer d-flex justify-content-between bg-light border">
          <a href="/detail/{{$item['id']}}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>

          <form action="/add_to_cart" method="POST">

            <input type="hidden" name="product_id" value="{{$item['id']}}">
            @csrf
            <button class="btn btn-sm text-dark p-0">Add to Cart</button>
          </form>
        </div>
      </div>
    </div>
    @endforeach

  </div>
</div>
<div class="pagination">
  {{ $products->links() }}
</div>
<!-- Products End -->