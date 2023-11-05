 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('admin.dashboard')}}">
         <div class="sidebar-brand-icon rotate-n-15">
             <i class="fas fa-laugh-wink"></i>
         </div>
         <div class="sidebar-brand-text mx-3">Admin Panel</div>
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider my-0">

     <!-- Nav Item - Dashboard -->
     <li class="nav-item active">
         <a class="nav-link" href="{{route('admin.dashboard')}}">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Dashboard</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Heading -->
     <div class="sidebar-heading">
         Interface
     </div>
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTen" aria-expanded="true" aria-controls="collapseTen">
             <i class="fas fa-fw fa-home"></i>
             <span>Home Page Settings</span>
         </a>
         <div id="collapseTen" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Home Page Section:</h6>
                 <a class="collapse-item" href="{{route('admin.home-page-setting')}}">Home Page Setting</a>
                 <a class="collapse-item" href="{{route('admin.home-page-category')}}">Home Page Category</a>
                 <a class="collapse-item" href="{{route('admin.home-sliders')}}">Home Page Banners</a>
             </div>
         </div>
     </li>
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsenine" aria-expanded="true" aria-controls="collapsenine">
             <i class="fas fa-fw fa-tag"></i>
             <span>Category</span>
         </a>
         <div id="collapsenine" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Category Section:</h6>
                 <a class="collapse-item" href="{{route('admin.view-categories')}}">All Categories</a>
                 <a class="collapse-item" href="{{route('admin.categories')}}">Add Category</a>
             </div>
         </div>
     </li>
     <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsenine1" aria-expanded="true" aria-controls="collapsenine1">
            <i class="fas fa-fw fa-tag"></i>
            <span>WholeSale</span>
        </a>
        <div id="collapsenine1" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">whole Sale Section:</h6>
                <a class="collapse-item" href="{{route('admin.wholesale')}}">All WholeSale</a>
            </div>
        </div>
    </li>
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseight" aria-expanded="true" aria-controls="collapseight">
             <i class="fas fa-fw fa-clock"></i>
             <span>Sale Timer Section</span>
         </a>
         <div id="collapseight" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Sale Timer Section:</h6>
                 <a class="collapse-item" href="{{route('admin.sale')}}">Sale-On</a>
             </div>
         </div>
     </li>
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsseven" aria-expanded="true" aria-controls="collapsseven">
             <i class="fas fa-fw fa-shopping-cart"></i>
             <span>Coupons</span>
         </a>
         <div id="collapsseven" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Coupon Section:</h6>
                 <a class="collapse-item" href="{{route('admin.coupons')}}">Coupons</a>
                 <a class="collapse-item" href="{{route('admin.add-coupon')}}">Add Coupon</a>
             </div>
         </div>
     </li>
     <!-- Nav Item - Pages Collapse Menu -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
             <i class="fas fa-fw fa-cog"></i>
             <span>Products</span>
         </a>
         <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Product Section:</h6>
                 <a class="collapse-item" href="{{route('admin.view-product-list')}}">All Products</a>
                 <a class="collapse-item" href="{{route('admin.view-in-active-products')}}">In-Active Products</a>
                 <a class="collapse-item" href="{{route('admin.view-all-active-products')}}">Active Products</a>
             </div>
         </div>
     </li>

     <!-- Nav Item - Utilities Collapse Menu -->
     <!-- <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
             <i class="fas fa-fw fa-wrench"></i>
             <span>Delivery</span>
         </a>
         <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Delivery Management:</h6>
                 <a class="collapse-item" href="utilities-color.html">Delivery Services</a>
             </div>
         </div>
     </li> -->

     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Heading -->
     <div class="sidebar-heading">
         Sale ON
     </div>

     <!-- Nav Item - Pages Collapse Menu -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
             <i class="fas fa-fw fa-folder"></i>
             <span>Orders</span>
         </a>
         <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Order Management:</h6>
                 <a class="collapse-item" href="{{route('admin.view_all_orders')}}">All Orders</a>
                 <a class="collapse-item" href="{{route('admin.view-pensing-orders')}}">Pending Orders</a>
                 <!--<a class="collapse-item" href="forgot-password.html">Dispatch Orders</a>-->
                 <!--<a class="collapse-item" href="404.html">Delivered Orders</a>-->
                 <!--<a class="collapse-item" href="blank.html">Cancel Orders</a>-->
             </div>
         </div>
     </li>

     <!-- Nav Item - Charts -->
     <li class="nav-item">
         <a class="nav-link" href="{{route('admin.view-vendors')}}">
             <i class="fas fa-fw fa-users"></i>
             <span>Vendors</span></a>
     </li>
     <li class="nav-item">
         <a class="nav-link" href="{{route('admin.contact-messages')}}">
             <i class="fas fa-fw fa-envelope"></i>
             <span>Messages</span></a>
     </li>
     <!-- Nav Item - Tables -->
     <li class="nav-item">
         <a class="nav-link" href="{{route('admin.vendors')}}">
             <i class="fas fa-fw fa-table"></i>
             <span>Vendor Stores</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider d-none d-md-block">



 </ul>
