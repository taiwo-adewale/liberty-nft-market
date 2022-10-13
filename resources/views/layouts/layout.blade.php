<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  @stack('swiper_css')
  <link rel="stylesheet" href="{{ asset('css/main.css') }}">
  <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <title>
    @yield('title', 'NFTsGo')
  </title>
</head>
<body>

  <header>
    <div class="lg:container relative z-50">
      <nav id="navbar" class="bg-white fixed left-0 right-0 min-h-[80px] not-fixed shadow">
        <div class="flex flex-grow justify-between items-center py-3 px-4 lg:container">
          <a href="{{ route('home.index') }}" class="w-[160px] sm:w-auto">
            <img src="{{ asset('images/logo.png') }}" alt="nftsgo logo">
          </a>
  
          <ul id="nav-menu" class="hidden lg:flex">
            <li><a href="{{ route('home.index') }}" class="{{ Route::currentRouteNamed('home.index') ? 'active' : '' }}">Home</a></li>
            <li><a href="{{ route('items.index') }}" class="{{ Route::currentRouteNamed('items.index') ? 'active' : '' }}">Explore</a></li>
            <li><a href="{{ route('authors.index') }}" class="{{ Route::currentRouteNamed('authors.index') ? 'active' : '' }}">Authors</a></li>

            @auth
              <li><a href="{{ route('items.create') }}" class="{{ Route::currentRouteNamed('items.create') ? 'active' : '' }}">Create Yours</a></li>
            @else
              <li><a href="{{ route('authors.login') }}" class="{{ Route::currentRouteNamed('authors.login') ? 'active' : '' }}">Login / Register</a></li>
            @endauth
            
            <li><a href="{{ route('contact.index') }}" class="{{ Route::currentRouteNamed('contact.index') ? 'active' : '' }}">Contact Us</a></li>
          </ul>
  
          <button id="menu-btn" class="hamburger">
            <span class="hamburger-top"></span>
            <span class="hamburger-middle"></span>
            <span class="hamburger-bottom"></span>
          </button>
        </div>
      </nav>
    </div>
  </header>

  @yield('content')

  <footer class="bg-brightPink">
    <div class="container">
      <div class="flex flex-wrap text-[15px] py-6 justify-center text-center gap-x-4 gap-y-1">
        <p>Copyright &copy; 2022 NFTsGo NFT Marketplace Co. Ltd</p>
        <p>All rights reserved.</p>
        <p>Designed by Wale</p>
      </div>
    </div>
  </footer>

  <x-flash-message />

  @stack('swiper_js')
  @stack('jquery')
  @stack('isotope')
  <script src="{{ asset('js/scripts.js') }}"></script>
</body>
</html>