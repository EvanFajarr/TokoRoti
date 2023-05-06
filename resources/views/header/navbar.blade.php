<?php 
 //use App\Http\Controllers\CartController;
// $total = CartController::cartItem();
?>

<header id="header-section">
    <nav class="navbar navbar-expand-lg pl-3 pl-sm-0" id="navbar">
    <div class="container">
      <div class="navbar-brand-wrapper d-flex w-100">

        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="mdi mdi-menu navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse navbar-menu-wrapper" id="navbarSupportedContent">
        <ul class="navbar-nav align-items-lg-center align-items-start ml-auto">
          <li class="d-flex align-items-center justify-content-between pl-4 pl-lg-0">
            <div class="navbar-collapse-logo">

            </div>
            <button class="navbar-toggler close-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="mdi mdi-close navbar-toggler-icon pl-5"></span>
            </button>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/">Home </a>
          </li>
       
          <li class="nav-item">
            <a class="nav-link" href="#Roti">Product</a>
          </li>
		  {{-- --}}


	

         

        <li class="nav-item btn-contact-us pl-4 pl-lg-0">
            <button class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Saran</button>
          </li>

          <li class="nav-item mx-1">
            @if (Auth::user())

            <li class="nav-item">
              <a class="nav-link "  href="/cartlist">Cart</a>
             
            </li>
        
            <li class="nav-item">
              <a class="nav-link" href="/orderUser">Order</a>
            </li>
  
              <div class="dropdown">
                <a class="btn btn-outline-danger dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                  @if (Auth::user()->role == "admin")
                  <a class="dropdown-item" href="/admin">Dasboard</a>
                  @endif

                  <a class="dropdown-item" href="/alamat">Tambah alamat</a>
                  {{-- <a class="dropdown-item" href="/order">Order</a> --}}
                  <form action="{{ url('/logout') }}" method="post">
                    @csrf
                       <button type="submit" class="btn btn-outline-warning "><i class="bi bi-box-arrow-right">Logout</i></button>
                  </form>
                </div>
              </div>
            @else
            <li class="nav-item">
              <a href="/login" class="nav-link">Login</a>
            </li>
            <li class="nav-item">
            <a href="/login/register" class="nav-link">Register</a>
            </li>
            @endif
        </ul>
      </div>
    </div>
    </nav>
  </header>