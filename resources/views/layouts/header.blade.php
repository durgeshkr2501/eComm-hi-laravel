<?php

use App\Models\Category;

   $categories = Category::select("id", "category_id", "name", "slug")
   ->with("childCategory")
   ->whereNull('category_id')->get()->toArray();
?>

<!-- Topbar Start -->
<div class="container-fluid">
  <div class="row bg-secondary py-2 px-xl-5">
    <div class="col-lg-6 d-none d-lg-block">
      <div class="d-inline-flex align-items-center">
        <a class="text-dark" href="">FAQs</a>
        <span class="text-muted px-2">|</span>
        <a class="text-dark" href="">Help</a>
        <span class="text-muted px-2">|</span>
        <a class="text-dark" href="">Support</a>
      </div>
    </div>
    <div class="col-lg-6 text-center text-lg-right">
      <div class="d-inline-flex align-items-center">
        <a class="text-dark px-2" href="">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a class="text-dark px-2" href="">
          <i class="fab fa-twitter"></i>
        </a>
        <a class="text-dark px-2" href="">
          <i class="fab fa-linkedin-in"></i>
        </a>
        <a class="text-dark px-2" href="">
          <i class="fab fa-instagram"></i>
        </a>
        <a class="text-dark pl-2" href="">
          <i class="fab fa-youtube"></i>
        </a>
      </div>
    </div>
  </div>
  <div class="row align-items-center py-3 px-xl-5">
    <div class="col-lg-3 d-none d-lg-block">
      <a href="/" class="text-decoration-none">
        <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
      </a>
    </div>
    <div class="col-lg-6 col-6 text-left">
      <form action="/poroducts">


        <div class="input-group">
          <input type="text" name="query" class="form-control" placeholder="Search for products">
          <div class="input-group-append">
            <button class="btn border" type="submit"> <i class="fa fa-search"></i></button>

          </div>
        </div>


      </form>
    </div>
    <div class="col-lg-3 col-6 text-right">
      <a href="" class="btn border">
        <i class="fas fa-heart text-primary" value="1"></i>
        <span class="badge" value="1">0 </span>
      </a>
      <a href="/cartlist" class="btn border"><i class="fas fa-shopping-cart text-primary"></i>
        <span class="badge">
          @if(auth()->check())
          {{ \App\Models\Cart::where('user_id', auth()->user()->id)->count() }}
          @else
          0
          @endif
        </span>
      </a>
    </div>
  </div>
</div>
<!-- Topbar End -->

<!-- Navbar Start -->
<div class="container-fluid">
  <div class="row border-top border-bottom px-xl-5">
    <div class="col-lg-3 d-none d-lg-block">
      <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
        <h6 class="m-0">Categories</h6>
        <i class="fa fa-angle-down text-dark"></i>
      </a>
      <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 1009;">
        <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
          @if(isset($categories))
          @foreach($categories as $category)
          <div class="nav-item dropdown">
            <a href="#" class="nav-link" data-toggle="dropdown">{{$category['name']}}
            @if($category['child_category'])
              <i class="fa fa-angle-down float-right mt-1"></i>
            @endif
            </a>
            @if($category['child_category'])
              <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                @foreach($category['child_category'] as $child)
                  <a href="/store/{{$category['slug']}}/{{$child['slug']}}/{{$child['id']}}" class="dropdown-item">{{ $child['name'] }}</a>
                @endforeach
              </div>
            @endif
          </div>
          @endforeach
          @endif
           </div>
      </nav>
    </div>
    <div class="col-lg-9">
      <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
        <a href="" class="text-decoration-none d-block d-lg-none">
          <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
          <div class="navbar-nav py-0">
            <a href="/myorder" class="nav-item nav-link text-success">My Order</a>
          </div>
          <div class="navbar-nav mr-auto py-0">
            <a href="contact.html" class="nav-item nav-link">Contact</a>
          </div>
          @if(auth()->check())
          <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle text-success" data-toggle="dropdown">
              {{ auth()->user()->name }}
            </a>
            <div class="dropdown-menu rounded-0 m-0">

              <form id="logout" action="/logout" method="post">
                @csrf()
              </form>
              <a href="javascript:void(0)" class="dropdown-item" onclick="$('#logout').submit()"> Logout</a>

            </div>
          </div>
          @else
          <a href="/login" class="nav-item nav-link">Login</a>
          <a href="/registration" class="nav-item nav-link">Register</a>
          @endif

        </div>
    </div>
    </nav>
  </div>
</div>
</div>
<!-- Navbar End -->