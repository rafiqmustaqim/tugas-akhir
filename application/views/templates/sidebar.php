

<div class="page-wrap">
    <div class="app-sidebar colored">
        <div class="sidebar-header">
            <a class="header-brand" href="index.html">
                <div class="logo-img">
                 <img src="<?php echo base_url('assets/') ?>src/img/brand-white.svg" class="header-brand-img" alt="lavalite"> 
             </div>
             <span class="text">ThemeKit</span>
         </a>
         <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>
         <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
     </div>

     <div class="sidebar-content">
        <div class="nav-container">
            <nav id="main-menu-navigation" class="navigation-main">
                <div class="nav-lavel">Navigation</div>
                <div class="nav-item " >
                    <a href="<?php echo base_url('assets/') ?>index.html"><i class="fa fa-home"></i><span>Dashboard</span></a>
                </div>
                <div class="nav-item">
                    <a href="<?php echo base_url('assets/') ?>navbar.html"><i class="ik ik-menu"></i><span>Navigation</span> <span class="badge badge-success">New</span></a>
                </div>


                <div class="nav-lavel">Penempatan</div>
                <div class="nav-item has-sub">
                    <a href="#"><i class="ik ik-edit"></i><span>Forms</span></a>
                    <div class="submenu-content">
                        <a href="../form-components.html" class="menu-item">User</a>
                        <a href="../form-addon.html" class="menu-item">Add-On</a>
                        <a href="../form-advance.html" class="menu-item">Advance</a>
                    </div>
                </div>



                <div class="nav-item has-sub">
                    <a href="#"><i class="ik ik-file-text"></i><span>Setting</span></a>
                    <div class="submenu-content">
                        <a href="<?php  echo base_url('Admin/getUser') ?>" class="menu-item">User</a>
                        <a href="" class="menu-item">Profil</a>
                    </div>
                </div>


                <div class="nav-lavel">Other</div>
                <div class="nav-item has-sub">
                    <a href="javascript:void(0)"><i class="ik ik-list"></i><span>Menu Levels</span></a>
                    <div class="submenu-content">
                        <a href="javascript:void(0)" class="menu-item">Menu Level 2.1</a>
                        <div class="nav-item has-sub">
                            <a href="javascript:void(0)" class="menu-item">Menu Level 2.2</a>
                            <div class="submenu-content">
                                <a href="javascript:void(0)" class="menu-item">Menu Level 3.1</a>
                            </div>
                        </div>
                        <a href="javascript:void(0)" class="menu-item">Menu Level 2.3</a>
                    </div>
                </div>

                <div class="nav-item">
                    <a href="javascript:void(0)"><i class="ik ik-award"></i><span>Sample Page</span></a>
                </div>
                <div class="nav-lavel">Support</div>
                <div class="nav-item">
                    <a href="javascript:void(0)"><i class="ik ik-monitor"></i><span>Documentation</span></a>
                </div>

            </nav>
        </div>
    </div>
</div>