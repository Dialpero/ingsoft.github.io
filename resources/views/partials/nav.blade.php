

@auth
<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
  <!-- Brand -->
  <!-- Links -->
  <ul class="navbar-nav">
  @if(Auth::user()->typeuser=='Administrador')
    <li class="nav-item">
      <a class="nav-link" href="{{ route('academics.index') }}">Académicos</a>
    </li>
    <li class="nav-item">   
      <a class="nav-link" href="{{ route('departamentos.show') }}">Departamentos</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('facultades.show') }}">Facultades</a>
    </li>
    <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown" >Usuarios</a>         
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('register') }}">Agregar usuario</a>
                <form method="POST" action="{{ route('show') }}">
                    @csrf
                    <div class="form-group">
                                <button type="submit" class="btn ">
                                    {{('   Ver Usuarios') }}
                                </button>
                    </div>
                </form>
            </div>
            </li>
  @elseif(Auth::user()->typeuser=='Secretaria' or Auth::user()->typeuser == 'Miembro comision evaluadora')
      <li class="nav-item">
        <a class="nav-link" href="{{ route('academics.index') }}">Académicos</a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="{{ route('facultades.show') }}">Facultades</a>
    </li>
  @elseif(Auth::user()->typeuser=='Decano')         
    <li class="nav-item">
      <a class="nav-link" href="{{ route('academics.index') }}">Académicos</a>
    </li>
    <li class="nav-item">   
      <a class="nav-link" href="{{ route('departamentos.show') }}">Departamentos</a>
    </li>
    <li class="nav-item">
    <li class="nav-item">
      <a class="nav-link" href="{{ route('facultades.show') }}">Facultades</a>
    </li>
  @elseif(Auth::user()->typeuser=='Director de escuela')
    <li class="nav-item">
      <a class="nav-link" href="{{ route('academics.index') }}">Académicos</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('facultades.show') }}">Facultades</a>
    </li>
  @endif        
                                                                                                                                                                                                                       
            <div  style="width:27px">
              <img src="{{asset('user.png')}}" class="img-fluid" alt="Responsive image">
            </div>
            <li class="nav-item dropdown ">
              <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                {{ Auth::user()->name }}
              </a>
              <div class="dropdown-menu" >
                <a class="dropdown-item" href="#">Editar</a>
                <a class="dropdown-item " href="#" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"> 
                    Cerrar sesión 
                </a>
              </div>
            </li>
            





  </ul>
</nav>
@endauth
<nav class="navbar navbar-light navbar-expand-lg bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{asset('logo.jpg')}}">
        </a>
        <button class="navbar-toggler" type="button" 
            data-toggle="collapse" 
            data-target="#navbarSupportedContent" 
            aria-controls="navbarSupportedContent" 
            aria-expanded="false" 
            aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="nav">
            <li class="nav nav-pills"><a class="nav-link {{setActive('home')}}" href="{{ route('home') }}">@lang('Home')</a></li>
            <li class="nav nav-pills"><a class="nav-link {{setActive('about')}}"href="{{ route('about') }}">@lang('About')</a></li>
            <li class="nav nav-pills"><a class="nav-link {{setActive('contact')}}"href="{{ route('contact') }}">@lang('Contact')</a></li>
            <div class="btn-group">
            @auth

            






            


                <li class="nav nav-pills">
                    <a class="nav-link" href="#" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"
                    >Cerrar Sesión</a>
                </li>
                
            @else
                <li class="nav nav-pills"><a class="nav-link {{ setActive('login') }}" href="{{ route('login') }}">Login</a></li>
            @endauth
        </ul>
        </div>
    </div>
</nav>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
    
</form>
</nav>
