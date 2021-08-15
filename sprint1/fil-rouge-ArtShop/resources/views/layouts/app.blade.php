<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" ></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <div style="z-index:100">
    @notifyCss
    <x:notify-messages />
    @notifyJs
    </div>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" style="z-index:0">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>




                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->


                        <a href="{{'cart'}}" class="nav-link">
                            <span class="fas fa-shopping-cart">

                                @if(session()->has('cart'))

                                    {{session()->get('cart')->totalQuantity}}
                                @else

                                    {{  session()->forget('cart')  }}
                                @endif


                            </span>
                        </a>
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{route('logout')}}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script type="text/javascript">
    $(document).ready(function(){

        const btns = document.querySelectorAll('.flask');
        const products = document.querySelectorAll('.col-md-4');

        btns.forEach(element => {

            element.addEventListener('click',e =>{


               const filter = e.target.dataset.filter;

                products.forEach(element => {

                   switch(filter){

                       case 'all' :
                        element.style.display = 'block';
                        break;

                       case 'standard':
                        if(element.classList.contains('standard'))
                        {
                            element.style.display = 'block';
                        }
                        else{
                            element.style.display = "none";
                        }
                       break;
                       case 'dyptique':
                          if(element.classList.contains('dyptique'))
                          {
                              element.style.display = 'block';
                          }
                          else
                          {
                              element.style.display = "none";
                          }
                       break;
                       case 'quadruple':
                       if(element.classList.contains('quadruple')){
                            element.style.display = 'block'
                       }
                       else
                       {
                        element.style.display = "none";
                       }
                       break;
                       case 'triptyque':

                       if(element.classList.contains('triptype')){
                        element.style.display = 'block'
                       }
                       else{
                        element.style.display = "none";
                       }
                       break;
                       default: console.log(`the ${filter} is not well`);
                   }
                })


            })
        })




    })






    </script>
</body>
</html>
