@include('layouts.head')
<body class="compact-menu">
   <!-- START APP WRAPPER -->
   <div id="app">
       <!-- START MENU SIDEBAR WRAPPER -->
       <aside class="sidebar sidebar-left">
           <div class="sidebar-content p-2">
               <div class="aside-toolbar">
                   <ul class="site-logo">
                       <li>
                           <!-- START LOGO -->
                           <a href="">
                               <div class="logo">
                                   
                               </div>
                           </a>
                           <!-- END LOGO -->
                       </li>
                   </ul>
               </div>
               @include('layouts.include.menu')
           </div>
       </aside>
       <!-- END MENU SIDEBAR WRAPPER -->
       <div class="content-wrapper">
           <!-- TOP TOOLBAR WRAPPER -->
           <nav class="top-toolbar navbar navbar-mobile navbar-tablet">
               <ul class="navbar-nav nav-left">
                   <li class="nav-item">
                       <a href="javascript:void(0)" data-toggle-state="aside-left-open">
                           <i class="icon dripicons-align-left"></i>
                       </a>
                   </li>
               </ul>
               <ul class="navbar-nav nav-center site-logo">
                   <li>
                       <a href="">
                           <div class="logo_mobile">
                               
                           </div>
                           <span class="brand-text"></span>
                       </a>
                   </li>
               </ul>
               <ul class="navbar-nav nav-right">
                   <li class="nav-item">
                       <a href="javascript:void(0)" data-toggle-state="mobile-topbar-toggle">
                           <i class="icon dripicons-dots-3 rotate-90"></i>
                       </a>
                   </li>
               </ul>
           </nav>
           <nav class="top-toolbar navbar navbar-desktop flex-nowrap">              
               <ul class="navbar-nav nav-right">
                   <li class="nav-item dropdown">
                       <a class="nav-link nav-pill user-avatar" data-toggle="dropdown" href="#" role="button"
                           aria-haspopup="true" aria-expanded="false">
                           <img src="{{ asset('backend/assets/img/user.png') }}" class="w-35 h-35 rounded-circle"
                              style="width: 30px; height: 30px;" alt="">
                       </a>
                       
                   </li>
               </ul>
               
           </nav>
           <!-- END TOP TOOLBAR WRAPPER -->
           <div class="content">
               <section class="page-content container-fluid">
                   @yield('content')
               </section>
           </div>

       </div>
   </div>

@include('layouts.footer')
