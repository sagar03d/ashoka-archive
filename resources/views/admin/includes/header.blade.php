  <header class="navbar navbar-header navbar-header-fixed">
    <a href="javascript:void(0);" id="mainMenuOpen" class="burger-menu d-lg-none" onclick="menuopen()">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
    </a>
    <!--<a href="#" id="filemgrMenu" class="burger-menu d-lg-none">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
    </a>-->
    <div class="navbar-brand">
      <a class="df-logo">Ashoka<span>University</span></a>
    </div>
    <div id="navbarMenu" class="navbar-menu-wrapper">
      <div class="navbar-menu-header">
        <a class="df-logo">Ashoka<span> University</span></a>
        <a id="mainMenuClose" href="javascript:void(0)"><i data-feather="x"></i></a>
      </div>
      
    </div>
    <div class="search-content" style="display: none;">
      <span class="close" onclick="closeSearch()">
        <i class="fa fa-times"></i>
      </span>
      
      <div class="search-text">
        <h3>Search</h3>
        <form action="#">
          <div class="row">
            <div class="col-lg-3 col-md-4 form-group">
                <label class="col-form-label">Name</label>
                <input type="text" class="form-control">
            </div>
            <div class="col-lg-3 col-md-4 form-group">
                <label class="col-form-label">Name</label>
                <input type="text" class="form-control">
            </div>
            <div class="col-lg-3 col-md-4 form-group">
                <label class="col-form-label">Name</label>
                <input type="text" class="form-control">
            </div>
            <div class="col-lg-3 col-md-4 form-group">
                <label class="col-form-label">Name</label>
                <input type="text" class="form-control">
            </div>
          </div>
          <button class="btn btn-primary btn-uppercase">Search</button>
        </form>
      </div>
    </div>
          
    <div class="navbar-right">
      
      <div class="dropdown dropdown-notification">
        <a class="dropdown-link new-indicator" data-toggle="dropdown" data-display="static" aria-expanded="false">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M22 17H2a3 3 0 0 0 3-3V9a7 7 0 0 1 14 0v5a3 3 0 0 0 3 3zm-8.27 4a2 2 0 0 1-3.46 0"></path></svg>
          <span>2</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
          <div class="dropdown-header">Notifications</div>
          <a class="dropdown-item">
            <div class="media">
              <div class="avatar avatar-sm">
                <span class="avatar-initial rounded-circle bg-gray-700">S</span>
              </div>
              <div class="media-body mg-l-15">
                <p>Congratulate <strong>Socrates Itumay</strong> for work anniversaries</p>
                <span>Mar 15 12:32pm</span>
              </div>
            </div>
          </a>
          <a class="dropdown-item">
            <div class="media">
              <div class="avatar avatar-sm">
                <span class="avatar-initial rounded-circle bg-gray-700">J</span>
              </div>
              <div class="media-body mg-l-15">
                <p><strong>Joyce Chua</strong> just created a new blog post</p>
                <span>Mar 13 04:16am</span>
              </div>
            </div>
          </a>
          <div class="dropdown-footer"><a>View all Notifications</a></div>
        </div>
      </div>

      


      <div class="dropdown dropdown-profile">
        <a href="" class="dropdown-link" data-toggle="dropdown" data-display="static" aria-expanded="false">
          <div class="avatar avatar-sm">
            <span class="avatar-initial rounded-circle bg-gray-700">A</span>
          </div>
        </a><!-- dropdown-link -->
        <div class="dropdown-menu dropdown-menu-right tx-13">
          <h6 class="tx-semibold mg-b-5">{{Auth::user()->name}}</h6>
          <p class="mg-b-25 tx-12 tx-color-03">Administrator</p>

          <a href="javascript:void(0)" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="dropdown-item">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line>
            </svg>Sign Out
          </a>
         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
          </form>
        </div><!-- dropdown-menu -->
      </div>


    </div>
  </header>