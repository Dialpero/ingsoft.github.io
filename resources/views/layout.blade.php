<!DOCTYPE html>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.fa {
  padding: 20px;
  font-size: 30px;
  width: 50px;
  text-align: center;
  text-decoration: none;
  margin: 5px 2px;
}

.fa:hover {
    opacity: 0.7;
}

.fa-facebook {
  background: #3B5998;
  color: white;
}

.fa-twitter {
  background: #55ACEE;
  color: white;
}

.fa-google {
  background: #dd4b39;
  color: white;
}

.fa-linkedin {
  background: #007bb5;
  color: white;
}

.fa-youtube {
  background: #bb0000;
  color: white;
}

.fa-instagram {
  background: #125688;
  color: white;
}

</style>
<head>
    <title>@yield('tittle')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="{{ mix('js/app.js') }}" defer></script>
    
</head>
<body>
    <div id="app" class="d-flex flex-column h-screen justify-content-between">
    <header>
        @include('partials.nav')
        @include('partials.session-status')
        
    </header>

    <main class="py-4">
        @yield('content')
        
    </main>

    

    <footer class="bg-with text-center text-black-50 py-3 shadow">
        <!-- Add font awesome icons -->

            <a href="https://www.facebook.com/ucatolicadelmaule/" class="fa fa-facebook  btn-sm"   alt="Cinque Terre"></a>
            <a href="https://twitter.com/ucatolicamaule" class="fa fa-twitter btn-sm" alt="Cinque Terre"></a>
            <a href="https://www.linkedin.com/edu/universidad-cat%C3%B3lica-del-maule-10952" class="fa fa-linkedin btn-sm"   alt="Cinque Terre"></a>
            <a href="https://www.youtube.com/channel/UCI6mMQ5izHQa9MvWUAUV_Eg" class="fa fa-youtube btn-sm"   alt="Cinque Terre"></a>
            <a href="https://www.instagram.com/ucatolicamaule/" class="fa fa-instagram btn-sm"   alt="Cinque Terre"></a>


        {{ config('app.name') }} | Copyright @ {{ date('Y') }}
    </footer>
    </div>
</body>
</html>
            