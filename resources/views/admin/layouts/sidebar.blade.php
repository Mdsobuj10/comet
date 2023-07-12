	<!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li class="menu-title"> 
                        <span>Main</span>
                    </li>
                    <li class=""> 
                        <a href="{{route('admin.deshboard.page')}}"><i class="fe fe-home"></i> <span>Dashboard</span></a>
                    </li>
                    @if (in_array('Slider', json_decode(Auth::guard('admin') -> user() -> role -> permission) ))  
                    <li class=""> 
                        <a href="{{route('slider.index')}}"><i class="fe fe-home"></i> <span>Slider</span></a>
                    </li>
                    @endif
                    @if (in_array('Testimonials', json_decode(Auth::guard('admin') -> user() -> role -> permission) ))  
                    <li class=""> 
                        <a href="{{route('testimonial.index')}}"><i class="fe fe-home"></i> <span>Testimonials</span></a>
                    </li>
                    @endif
                    @if (in_array('Our Client', json_decode(Auth::guard('admin') -> user() -> role -> permission) ))  
                    <li class=""> 
                        <a href="{{route('client.index')}}"><i class="fe fe-home"></i> <span>Our Client</span></a>
                    </li>
                    @endif
                    @if (in_array('Portflio', json_decode(Auth::guard('admin') -> user() -> role -> permission) ))  
                    <li class=""> 
                        <a href="#"><i class="fe fe-home"></i> <span>Portflio</span></a>
                    </li>
                    @endif
                    @if (in_array('Posts', json_decode(Auth::guard('admin') -> user() -> role -> permission) ))  
                    <li class="submenu">
                        <a href="#"><i class="fe fe-document"></i> <span>Posts</span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="#">All Posts</a></li>
                            <li><a href="#">Category</a></li>
                            <li><a href="#">Tags</a></li>
                        </ul>
                    </li>
                    @endif

                     @if (in_array('User', json_decode(Auth::guard('admin') -> user() -> role -> permission) ))  
                     <li class="menu-title"> 
                        <span>Admin Option</span>
                    </li>
                     <li class="submenu">
                        <a href="#"><i class="fe fe-document"></i> <span> Admin User</span> <span class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="{{route('admin-user.index')}}">User</a></li>
                            <li><a href="{{route('role.index')}}">Role</a></li>
                            <li><a href="{{route('permission.index')}}">Permission</a></li>
                        </ul>
                    </li>
                   
                     @endif
                     @if (in_array('Setting', json_decode(Auth::guard('admin') -> user() -> role -> permission) ))  
                    <li class=""> 
                        <a href="#"><i class="fe fe-home"></i> <span>Setting</span></a>
                    </li>
                    @endif
                    @if (in_array('Theme Option', json_decode(Auth::guard('admin') -> user() -> role -> permission) ))  
                     <li class=""> 
                        <a href="#"><i class="fe fe-home"></i> <span>Theme Option</span></a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
    <!-- /Sidebar -->