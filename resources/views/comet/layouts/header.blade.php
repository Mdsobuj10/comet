    <!-- Navigation Bar-->
    <header id="topnav">
        <div class="container">
          <!-- Logo container-->
          <div class="logo">
            <a href="{{route('home.page')}}">
              <img src="frontend/images/logo_light.png" alt="" class="logo-light">
              <img src="frontend/images/logo_dark.png" alt="" class="logo-dark">
            </a>
          </div>
          <!-- End Logo container-->
          <div class="menu-extras">
            <div class="menu-item">
              <!-- Shopping cart-->
              <div class="cart">
                <a href="#">
                  <i class="ti-bag"></i><span class="cart-number">2</span>
                </a>
                <div class="shopping-cart">
                  <div class="shopping-cart-info">
                    <div class="row">
                      <div class="col-xs-6">
                        <h6 class="upper">Your Cart</h6>
                      </div>
                      <div class="col-xs-6 text-right">
                        <h6 class="upper">$399.99</h6>
                      </div>
                    </div>
                    <!-- end of row-->
                  </div>
                  <ul class="nav product-list">
                    <li>
                      <div class="product-thumbnail">
                        <img src="frontend/images/shop/2.jpg" alt="">
                      </div>
                      <div class="product-summary">
                        <a href="#">Premium Suit Blazer</a><span>$199.99</span>
                      </div>
                    </li>
                    <li>
                      <div class="product-thumbnail">
                        <img src="frontend/images/shop/5.jpg" alt="">
                      </div>
                      <div class="product-summary">
                        <a href="#">Reiss Vara Tailored Blazer</a><span>$199.99</span>
                      </div>
                    </li>
                  </ul>
                  <p><a href="#" class="btn btn-color btn-block btn-sm">Checkout</a>
                  </p>
                </div>
              </div>
              <!-- End shopping cart-->
            </div>
            <div class="menu-item">
              <!-- Search Form-->
              <div class="search">
                <a href="#">
                  <i class="ti-search"></i>
                </a>
                <div class="search-form">
                  <form action="#" class="inline-form">
                    <div class="input-group">
                      <input type="text" placeholder="Search" class="form-control"><span class="input-group-btn"><button type="button" class="btn btn-color"><span><i class="ti-search"></i></span>
                      </button>
                      </span>
                    </div>
                  </form>
                </div>
              </div>
              <!-- End search form-->
            </div>
            <div class="menu-item">
              <!-- Mobile menu toggle-->
              <a class="navbar-toggle">
                <div class="lines">
                  <span></span>
                  <span></span>
                  <span></span>
                </div>
              </a>
              <!-- End mobile menu toggle-->
            </div>
          </div>
          <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu">
               <li><a href="{{route('home.page')}}">Home</a></li>
               <li><a href="{{route('home.page')}}">About</a></li>
               <li><a href="{{route('home.page')}}">Priging</a></li>
               <li><a href="{{route('home.page')}}">Team</a></li>
               <li><a href="{{route('home.page')}}">Our-Client</a></li>
               <li><a href="{{route('contact.page')}}">Contact-Us</a></li>
              {{-- <li class="has-submenu">
                <a href="#">Blog</a>
                <ul class="submenu">
                  <li>
                    <a href="blog-fixed-image.html">Fixed Image</a>
                  </li>
                  <li class="has-submenu">
                    <a href="#">Classic</a>
                    <ul class="submenu">
                      <li>
                        <a href="blog.html">No Sidebar</a>
                      </li>
                      <li>
                        <a href="blog-sidebar.html">Right Sidebar</a>
                      </li>
                      <li>
                        <a href="blog-sidebar-left.html">Left Sidebar</a>
                      </li>
                    </ul>
                  </li>
                  <li class="has-submenu">
                    <a href="#">Masonry</a>
                    <ul class="submenu">
                      <li>
                        <a href="blog-masonry.html">No Sidebar</a>
                      </li>
                      <li>
                        <a href="blog-masonry-sidebar.html">Right Sidebar</a>
                      </li>
                      <li>
                        <a href="blog-masonry-sidebar-left.html">Left Sidebar</a>
                      </li>
                    </ul>
                  </li>
                  <li class="has-submenu">
                    <a href="#">Single Post</a>
                    <ul class="submenu">
                      <li>
                        <a href="blog-single.html">No Sidebar</a>
                      </li>
                      <li>
                        <a href="blog-single-sidebar.html">Right Sidebar</a>
                      </li>
                      <li>
                        <a href="blog-single-sidebar-left.html">Left Sidebar</a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </li> --}}

            </ul>
            <!-- End navigation menu        -->
          </div>
        </div>
      </header>
      <!-- End Navigation Bar-->