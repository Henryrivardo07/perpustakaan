<div class="sidebar">
  <!-- Sidebar user (optional) -->
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
      <img src="{{ asset('templating/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
      <!-- Tampilkan nama user jika login -->
      @auth
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
      @else
          <a href="#" class="d-block">Guest</a>
      @endauth
    </div>
  </div>

  <!-- SidebarSearch Form -->
  <div class="form-inline">
    <div class="input-group" data-widget="sidebar-search">
      <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
      <div class="input-group-append">
        <button class="btn btn-sidebar">
          <i class="fas fa-search fa-fw"></i>
        </button>
      </div>
    </div>
  </div>

  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

      <!-- Menu Dashboard (selalu muncul) -->
      <li class="nav-item">
          <a href="/" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                  Dashboard
              </p>
          </a>
      </li>

      <!-- Category Management (hanya muncul jika login) -->
      @auth
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-th"></i>
          <p>
            Category
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="/category/create" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Tambah Category</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/category" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Edit Category</p>
            </a>
          </li>
        </ul>
      </li>
      @endauth

      <!-- Authenticated User - Logout -->
      @auth
          <li class="nav-item bg-danger">
              <a class="nav-link" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                  <i class="fas fa-sign-out-alt"></i>
                  <p>{{ __('Logout') }}</p>
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
          </li>
      @endauth

      <!-- Guest User - Login and Register -->
      @guest
          <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">
                  <i class="fas fa-sign-in-alt"></i>
                  <p>{{ __('Login') }}</p>
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">
                  <i class="fas fa-user-plus"></i>
                  <p>{{ __('Register') }}</p>
              </a>
          </li>
      @endguest
    </ul>
  </nav>
  <!-- /.sidebar-menu -->
</div>
