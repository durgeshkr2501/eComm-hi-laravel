<?php
  if(auth()->check()) {
    $total = \App\Models\Cart::where('user_id', auth()->user()->id)->count(); 
  }
?>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">E-Comm</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        @if(auth()->check())
          <li class=""><a href="#"> Orders </a></li>
        @endif
        </ul>
      <form action="/search" class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" name="query" class="form-control search-box" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Search</button>
      </form>
      <ul class="nav navbar-nav navbar-right">

        @if(auth()->check()) 
        
         
          <li>
            <a href="/cartlist"> Items:{{ $total }} </a>
          </li>
          <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">{{ auth()->user()->name }}
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li>
            <form id="logout" action="/logout" method="post">
              @csrf()
            </form>
            <a href="javascript:void(0)" onclick="$('#logout').submit()" > Logout</a>
            </li>
          </ul>
        </li>
        @else 
          <li><a href="/login">Login</a></li>
        @endif
            
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>