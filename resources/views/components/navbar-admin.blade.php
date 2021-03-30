<!-- Topnav -->
<nav class="navbar navbar-top navbar-expand navbar-dark bg-gradient-primary border-bottom">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        
            <!-- Navbar links -->
            <ul class="navbar-nav align-items-center  ml-md-auto ">
                <li class="nav-item d-xl-none">
                    <!-- Sidenav toggler -->
                    <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin"
                        data-target="#sidenav-main">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
                <li class="nav-item dropdown">
                    <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <div class="media align-items-center">
                            <span class="avatar avatar-sm rounded-circle">
                                <img alt="Image placeholder" src="{{asset('assets/img/theme/team-4.jpg')}}">
                            </span>
                            <div class="media-body  ml-2  d-none d-lg-block">
                                <span
                                    class="mb-0 text-sm  font-weight-bold">{{Auth()->guard('admin')->user()->nama_petugas}}</span>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu  dropdown-menu-right ">
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome!</h6>
                        </div>
                        <a href="/admin/profile" class="dropdown-item">
                            <i class="ni ni-single-02"></i>
                            <span>My profile</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="" class="dropdown-item" data-toggle="modal" data-target="#admin-logout">
                            <i class="ni ni-user-run"></i>
                            <span>Logout</span>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="col-md-4">
      <div class="modal fade" id="admin-logout" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content bg-gradient-white">
        	
            <div class="modal-header">
                <h6 class="modal-title text-default" id="admin-logout">Logout</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            
            <div class="modal-body">
            	
                <div class="py-3 text-center">
                    <i class="ni ni-user-run ni-3x text-default"></i>
                    <h4 class="heading mt-4 text-default">Anda yakin ingin logout?</h4>
                </div>
                
            </div>
            
            <div class="modal-footer">
                <a type="button"  class="btn btn-default" data-dismiss="modal">Batal</a>
                <a type="button" href="{{route('admin.logout')}}" class="btn btn-primary text-white ml-auto">Logout</a>
            </div>
            
        </div>
    </div>
</div>

  </div>
