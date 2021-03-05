<div class="app-sidebar colored" >
    <div class="sidebar-header" style="background-image: linear-gradient(to left, rgba(64,78,103,0), rgba(0,0,255,1));">
        <a class="header-brand" href="#">
            <div class="logo-img">
                <img src="img/logo/3.jpg"  alt="lavalite" width="30px" class="rounded-circle">
            </div>
            <span class="text" style="font-size:17px;"><?php echo $_SESSION['hospital'];?></span>
        </a>
        <button type="button" class="nav-toggle"><i id="tog" data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>
        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
    </div>

    <div class="sidebar-content" style="background-image: linear-gradient(to left, rgba(64,78,103,0), rgba(0,0,255,1));">
        <div class="nav-container">
            <nav id="main-menu-navigation" class="navigation-main">
                <div class="nav-lavel">
                    <?php echo $_SESSION['username'].' ( '.$_SESSION['roleName'].')';?>
                </div>
<div id="sidebardata"></div> 
            </nav>
        </div>
    </div>
</div>
