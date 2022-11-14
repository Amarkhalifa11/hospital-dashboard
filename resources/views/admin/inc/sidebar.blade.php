<aside class="left-sidebar bg-sidebar">
  <div id="sidebar" class="sidebar sidebar-with-footer">
    <!-- Aplication Brand -->
    <div class="app-brand">
      <a href="/dashboard">
        <svg
          class="brand-icon"
          xmlns="http://www.w3.org/2000/svg"
          preserveAspectRatio="xMidYMid"
          width="30"
          height="33"
          viewBox="0 0 30 33"
        >
          <g fill="none" fill-rule="evenodd">
            <path
              class="logo-fill-blue"
              fill="#7DBCFF"
              d="M0 4v25l8 4V0zM22 4v25l8 4V0z"
            />
            <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
          </g>
        </svg>
        <span class="brand-name">hospital Dashboard</span>
      </a>
    </div>
    <!-- begin sidebar scrollbar -->
    <div class="sidebar-scrollbar">

      <!-- sidebar menu -->
      <ul class="nav sidebar-inner" id="sidebar-menu">
        

        
          <li  class="has-sub active expand" >
            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#dashboard"
              aria-expanded="false" aria-controls="dashboard">
              <i class="mdi mdi-view-dashboard-outline"></i>
              <span class="nav-text">users</span> <b class="caret"></b>
            </a>
            <ul  class="collapse"  id="dashboard"
              data-parent="#sidebar-menu">
              <div class="sub-menu">
                
                  
                    <li  class="active" >
                      <a class="sidenav-item-link" href="{{ route('users') }}">
                        <span class="nav-text">all users</span>
                        
                      </a>
                    </li>
              
              </div>
            </ul>
          </li>
        
        
          <li  class="has-sub active expand" >
            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#charts"
              aria-expanded="false" aria-controls="charts">
              <i class="mdi mdi-chart-pie"></i>
              <span class="nav-text">categories</span> <b class="caret"></b>
            </a>
            <ul  class="collapse"  id="charts"
              data-parent="#sidebar-menu">
              <div class="sub-menu">
                
                
                  
                    <li class="active">
                      <a class="sidenav-item-link" href="{{ route('categories') }}">
                        <span class="nav-text">all category</span>
                        
                      </a>
                    </li>

                    <li class="active">
                      <a class="sidenav-item-link" href="{{ route('categories.create') }}">
                        <span class="nav-text">add category</span>
                        
                      </a>
                    </li>

                    <li class="active">
                      <a class="sidenav-item-link" href="{{ route('categories.deletedcategories') }}">
                        <span class="nav-text">soft delete</span>
                        
                      </a>
                    </li>
                  
                

                
              </div>
            </ul>
          </li>

                         
          <li  class="has-sub active expand" >
            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#pages"
              aria-expanded="false" aria-controls="pages">
              <i class="mdi mdi-image-filter-none"></i>
              <span class="nav-text">Doctors</span> <b class="caret"></b>
            </a>
            <ul  class="collapse"  id="pages"
              data-parent="#sidebar-menu">
              <div class="sub-menu">
                
                
                  
                    <li >
                      <a class="sidenav-item-link" href="{{ route('doctors') }}">
                        <span class="nav-text">All Doctors</span>
                        
                      </a>
                    </li>

                    <li >
                      <a class="sidenav-item-link" href="{{ route('doctors.create') }}">
                        <span class="nav-text">Add Doctors</span>
                        
                      </a>
                    </li>

                    <li >
                      <a class="sidenav-item-link" href="{{ route('doctors.thedeleted') }}">
                        <span class="nav-text">trashed doctors</span>
                        
                      </a>
                    </li>

                 

                
              </div>
            </ul>
          </li>

          <li  class="has-sub  active expand" >
            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#documentation"
              aria-expanded="false" aria-controls="documentation">
              <i class="mdi mdi-book-open-page-variant"></i>
              <span class="nav-text">posts</span> <b class="caret"></b>
            </a>
            <ul  class="collapse"  id="documentation"
              data-parent="#sidebar-menu">
              <div class="sub-menu">

              
                    <li >
                      <a class="sidenav-item-link" href="{{ route('posts') }}">
                        <span class="nav-text">all posts</span>
                        
                      </a>
                    </li>
                  
                    <li >
                      <a class="sidenav-item-link" href="{{ route('posts.create') }}">
                        <span class="nav-text">add posts</span>
                        
                      </a>
                    </li>

                    <li >
                      <a class="sidenav-item-link" href="{{ route('posts.thedeleted') }}">
                        <span class="nav-text">trashed posts</span>
                        
                      </a>
                    </li>
  
                
              </div>
            </ul>
          </li>
        
  
      </ul>

    </div>




    <hr class="separator" />

    <div class="sidebar-footer">
      <div class="sidebar-footer-content">
        <h6 class="text-uppercase">
          Cpu Uses <span class="float-right">40%</span>
        </h6>
        <div class="progress progress-xs">
          <div
            class="progress-bar active"
            style="width: 40%;"
            role="progressbar"
          ></div>
        </div>
        <h6 class="text-uppercase">
          Memory Uses <span class="float-right">65%</span>
        </h6>
        <div class="progress progress-xs">
          <div
            class="progress-bar progress-bar-warning"
            style="width: 65%;"
            role="progressbar"
          ></div>
        </div>
      </div>
    </div>
  </div>
</aside>