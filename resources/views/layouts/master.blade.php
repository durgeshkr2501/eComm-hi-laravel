<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-comm Project</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="/assets/bootstrap/bootstrap.min.css">
    <script src="/assets/jquery.js" ></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="/assets/bootstrap/bootstrap.bundle.min.js">

    </script>
</head>

<body>
    @include('layouts.header')
    @yield('content')
    @include('layouts.footer')
</body>
<style>
    .custom-login {
        height: 500px;
        padding-top: 100px;
    }
    .slider-img{
        height: 400px !important;

        }
    .custom-product{
        height: 600px;
    }    
    .slider-text{
        
        color: black;
    }
    .trending-img{
        height: 100px;

    }
    .trending-item{
        float: left;
        width: 20%;
    }
    .trending-wrapper{
        margin: 20px;
    }
    .detail-img{
        height: 200px;
    }
    .search-box{
        width: 500px !important
    }
</style>
</html>