<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{url(\App\Models\Setting::where('slug','logo')->first()->value ?? '')}}" alt="AdminLTELogo" height="60" width="240">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">

        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li>
                <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                    <i class="fas fa-bars"></i>
                </a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <li>
                <!-- <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
                    <i class="fas fa-th-large"></i>
                </a> -->
                <div class="dropdown dropdown-menubar">
                    <button class="btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="admin-profile">
                            <img src="{{url('admin/images/admin.png')}}" class="img-fluid"/>
                        </div>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="{{url('admin/change_password')}}">Change Password</a></li>
                        <li><a class="dropdown-item" href="logout">Log Out</a></li>
                    </ul>
                </div>
            </li>
        </ul>
        
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{url('admin/index')}}" class="brand-link">
            <span class="brand-text font-weight-light">
                <img class="extratech-logo" src="{{url(\App\Models\Setting::where('slug','logo')->first()->value ?? '')}}" alt="Insert Logo from Settings">
            </span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar sb">
            <!-- Sidebar user panel (optional) -->
            <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{url('admin/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{Auth::user()->name}}</a>
                </div>
            </div> -->

            <!-- Sidebar Menu -->
            <nav class="mt-4">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="{{url('admin/settings')}}" class="nav-link {{(Request::segment(2) == 'settings') ? 'active' : ''}}">
                            <i class="fa fa-cog" aria-hidden="true"></i>
                            <p>
                                Settings
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{url('admin/sliders')}}" class="nav-link {{(Request::segment(2) == 'sliders') ? 'active' : ''}}">
                            <i class="fas fa-sliders-h"></i>
                            <p>
                                Sliders
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{url('admin/services')}}" class="nav-link {{(Request::segment(2) == 'services') ? 'active' : ''}} ">
                            <i class="fa fa-wrench" aria-hidden="true"></i>
                            <p>
                                Services
                            </p>
                        </a>
                    </li>

                    

                    <li class="nav-item">
                        <a href="{{url('admin/galleries')}}" class="nav-link  {{(Request::segment(2) == 'galleries') ? 'active' : ''}}">
                            <i class="fa-regular fa-images"></i>
                            <p>
                                Galleries
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{url('admin/about_us')}}" class="nav-link  {{(Request::segment(2) == 'about_us') ? 'active' : ''}}">
                            <i class="fa-solid fa-users"></i>
                            <p>
                                About Us
                            </p>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="{{url('admin/testimonials')}}" class="nav-link {{(Request::segment(2) == 'testimonials') ? 'active' : ''}}">
                            <i class="fa fa-quote-right" aria-hidden="true"></i>
                            <p>
                                Testimonials
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{url('admin/ndis_pricing')}}" class="nav-link {{(Request::segment(2) == 'ndis_pricing') ? 'active' : ''}}">
                            <i class="fa fa-quote-right" aria-hidden="true"></i>
                            <p>
                                NDIS PRICING
                            </p>
                        </a>
                    </li>

                    

                    <li class="nav-item">
                        <a href="{{url('admin/subscriptions')}}" class="nav-link {{(Request::segment(2) == 'subscriptions') ? 'active' : ''}}">
                            <i class="fa-solid fa-hand-pointer"></i>
                            <p>
                                Subscriptions
                            </p>
                        </a>
                    </li>

                    <!-- <li class="nav-item">
                        <a href="{{url('admin/teams')}}" class="nav-link {{(Request::segment(2) == 'teams') ? 'active' : ''}}">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <p>
                                Teams
                            </p>
                        </a>
                    </li> -->

                    <li class="nav-item">
                        <a href="{{url('admin/contacts')}}" class="nav-link">
                            <i class="fa-solid fa-id-badge"></i>
                            <p>
                                Contact/Enquiry
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{url('admin/referrals')}}" class="nav-link">
                            <i class="fa-solid fa-user-group"></i>
                            <p>
                                Referrals
                            </p>
                        </a>
                    </li>

                    <!-- <li class="nav-item">
                        <a href="{{url('admin/seo_titles')}}" class="nav-link {{(Request::segment(2) == 'departments') ? 'active' : ''}}">
                            <i class="fa-solid fa-magnifying-glass"></i>
                            <p>
                                Seo Titles
                            </p>
                        </a>
                    </li> -->
                    
                    
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>


    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
