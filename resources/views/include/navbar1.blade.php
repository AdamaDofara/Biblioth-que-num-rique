
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="index.html"><img src="{{asset('backend/images/2h_.png')}}" class="mr-2" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="ti-layout-grid2"></span>
        </button>
        <ul class="navbar-nav mr-lg-f2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
            </div>
          </li>
        </ul>
        <ul class="nav flex-column sub-menu">
            
        </ul>
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item">
              <a class="nav-link" href="{{URL::to('/')}}" >
                  Accueil
              </a>
          </li>
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link" href="#" data-toggle="dropdown" id="profileDropdown">
                <img src="{{asset('backend/images/logo_2H_tech.png')}}" alt="profile"/>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                <a class="dropdown-item" href="/deconnexion">
                  <i class="ti-power-off text-primary"></i>
                  Deconnexion
                </a>
              </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="ti-layout-grid2"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
   
