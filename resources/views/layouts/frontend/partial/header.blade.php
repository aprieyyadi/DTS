
      <header role="banner">
        <div class="top-bar">
          <div class="container">
            <div class="row">
              <div class="col-9 social">
                   <a href="https://twitter.com/dts_kominfo"><span class="fa fa-twitter"></span> Twitter</a>
                     <a href="https://www.facebook.com/digitalent.kominfo/"><span class="fa fa-facebook"></span> Facebook</a>
                     <a href="https://www.instagram.com/digitalent.kominfo/?hl=id"><span class="fa fa-instagram"></span> Instagram</a>
              </div>
              <div class="col-3 search-top">
                <!-- <a href="#"><span class="fa fa-search"></span></a> -->
                     <form method="GET" action="{{ route('search') }}">
           
                <input class="src-input" value="{{ isset($query) ? $query : '' }}" name="query" type="text" placeholder="Search">
                <span class="icon fa fa-search"></span> 
            </form>

              </div>
            </div>
          </div>
        </div>

        <div class="container logo-wrap">
          <div class="row pt-5">
            <div class="col-12 text-center">
              <a class="absolute-toggle d-block d-md-none" data-toggle="collapse" href="#navbarMenu" role="button" aria-expanded="false" aria-controls="navbarMenu"><span class="burger-lines"></span></a>
              <h1 class="site-logo"><a href="{{ route('home') }}"><img src="{{asset('images/dts.png')}}" alt="">News</a></h1>
            </div>
          </div>
        </div>
        
        <nav class="navbar navbar-expand-md  navbar-light bg-light">
          <div class="container">
            
           
            <div class="collapse navbar-collapse" id="navbarMenu">
              <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                  <a class="nav-link active" href="{{route('home')}}">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('post.index')}}">Posts</a>
                </li>
      
                <li class="nav-item">
                  <a class="nav-link" href="{{route('about')}}">About</a>
                </li>
 
                 @guest
                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
            @else
                @if(Auth::user()->role->id == 1)
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                @endif
                @if(Auth::user()->role->id == 2)
                    <li class="nav-item"><a class="nav-link" href="{{ route('author.dashboard') }}">Dashboard</a></li>
                @endif
            @endguest
              </ul>
              
            </div>
          </div>
        </nav>
      </header>
      <!-- END header -->

    
