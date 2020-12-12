<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>cms</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        
        
        <link href="{{url('../frontend/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
        <!-- Custom fonts for this template -->
        <link href="{{url('../frontend/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css">

        <!-- Custom styles for this template -->
        <link href="{{url('../frontend/css/clean-blog.min.css') }}" rel="stylesheet">

        <!-- Styles -->
        
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
            
         <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="index.html">Nazmul Hassan</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
           
          <li class="nav-item">
            <a class="nav-link" href="{{route('home')}}">Home</a>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="{{route('gallery')}}">Gallery</a>
          </li> 
          <li class="nav-item">
            <a class="nav-link" href="{{route('blog')}}">Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('about')}}">About</a>
          </li>
          @if (Route::has('login'))
            <li class="nav-item">
             @auth
                <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
            </li>
            @else
            <li class="nav-item">
                <a href="{{ route('login') }}" class="nav-link">Login</a>
            </li>
            <li class="nav-item">
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="nav-link">Register</a>
                @endif
             @endauth
            </li>
          @endif
        </ul>
      </div>
    </div>
  </nav>
  <header class="masthead" style="background-image: url({{url('../frontend/img/home-bg.jpg')}})">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Content Manegement System</h1>
            <span class="subheading">A Blog Theme by Start Bootstrap</span>
          </div>
        </div>
      </div>
    </div>
  </header>
  
  <!-- Main Content -->
  <div class="container">
        @yield('content')
    </div>
            
        
           
            
            
             
        </div>
        
        
        <!-- Footer -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <ul class="list-inline text-center">
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
          </ul>
          <p class="copyright text-muted">Copyright &copy; Nazmul</p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="{{url('../frontend/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{url('../frontend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <!-- Custom scripts for this template -->
  <script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="{{url('../frontend/js/clean-blog.min.js')}}"></script>
  <script>
    @if(Session::has('messege'))
        var type="{{Session::get('alert-type','info')}}"
        switch(type){
            case 'info':
                toastr.info("{{Session::get('messege')}}");
            break;
            case 'success':
                toastr.success("{{Session::get('messege')}}");
            break;
            case 'warning':
                toastr.warning("{{Session::get('messege')}}");
            break;
            case 'error':
                toastr.error("{{Session::get('messege')}}");
            break;
        }
    @endif
  </script>
  <script>
    $(document).on("click","#delete",function(e){
        e.preventDefault();
        var link = $(this).attr("href");
        swal({
              title: "Are you want to delete?",
              text: "Once Delete, This will be Permanently Delete!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            });
    .then((willDelete) => {
          if (willDelete) {
                window.location.href = link;
              }else{
                swal("Safe Data!");
            }
        });
    });
  </script>
    </body>
</html>
