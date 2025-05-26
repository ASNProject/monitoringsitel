@extends('layouts.app', ['title' => 'Dashboard'])
  @section('content')
  <body>
      <main>
             {{-- NAVBAR --}}
     <nav class="navbar navbar-expand-lg navbar-light bg-light">
         <a class="navbar-brand font-weight-bold" style="font-size: 24px" href="#">Your Dashboard</a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>
         
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav mr-auto">
             <li class="nav-item active">
                 <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
             </li>
             <li class="nav-item">
                 <a class="nav-link" href="#">Link</a>
             </li>
             <li class="nav-item dropdown">
                 <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 Dropdown
                 </a>
                 <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                 <a class="dropdown-item" href="#">Action</a>
                 <a class="dropdown-item" href="#">Another action</a>
                 <div class="dropdown-divider"></div>
                 <a class="dropdown-item" href="#">Something else here</a>
                 </div>
             </li>
             <li class="nav-item">
                 <a class="nav-link disabled" href="#">Disabled</a>
             </li>
             </ul>
             <form class="form-inline my-2 my-lg-0" action="{{ route('logout') }}" method="POST"
                 onsubmit="return confirm('Are you sure you want to logout?')">
                 @csrf
                 <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Logout</button>
             </form>
 
         </div>
     </nav>
     {{-- END NAVBAR --}}
     {{-- MAIN CODE --}}
        <div class="m-3 py-1">
          <div class="p-3 mb-4 bg-light rounded-3">
            <div class="container-fluid">
              {{-- @session('success')
                  <div class="alert alert-success" role="alert"> 
                    {{ $value }}
                  </div>
              @endsession --}}
      
              <h1 class="display-5 fw-bold">Hi, {{ auth()->user()->name }}</h1>
              <p class="col-md-8 fs-4">Welcome to dashboard.<br/>Using a series of utilities, you can create this jumbotron, just like the one in previous versions of Bootstrap. Check out the examples below for how you can remix and restyle it to your liking.</p>
              <button class="btn btn-primary btn-lg" type="button">Dashboard</button>
            </div>
          </div>
      
        </div>
      </main>
  </body>
  @endsection