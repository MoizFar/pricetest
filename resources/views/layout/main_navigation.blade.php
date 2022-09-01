<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
   
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item dashboard"><a class="d-flex align-items-center" href="{{url('admin/home')}}"><i data-feather="home"></i><span class="menu-title text-truncate">Dashboard</span></a>
</li>

              
<li class="classrooms"><a class="d-flex align-items-center" href="{{ url('admin/categories') }}"><i data-feather="home"></i><span class="menu-item text-truncate"> Categories</span></a>
                    </li>

                 <li class="post"><a class="d-flex align-items-center" href="{{ url('admin/products') }}"><i data-feather="home"></i><span class="menu-item text-truncate">Products</span></a>
                    </li>   

          
           <li class=" nav-item logout"><a class="d-flex align-items-center" href="{{url('admin/adminlogout')}}"><i data-feather="home"></i><span class="menu-title text-truncate">Logout</span></a>
</li>
          

        </ul>
    </div>
</div>
<!-- END: Main Menu-->
