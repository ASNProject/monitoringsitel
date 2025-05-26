<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <img src="{{ asset('assets/logo.png')}}" alt="Logo" style="height: 60px;">
    <a class="navbar-brand font-weight-bold" style="font-size: 24px; margin-left: 20px" href="#">Monitoringsintel</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
          <a class="nav-link" href="{{ url('/') }}">Home</a>
        </li>
        <li class="nav-item {{ request()->is('data') ? 'active' : '' }}">
          <a class="nav-link" href="{{ url('/data') }}">Data</a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0" action="{{ route('logout') }}" method="POST"
        onsubmit="return confirm('Are you sure you want to logout?')">
        @csrf
        <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Keluar</button>
      </form>
    </div>
  </nav>
  