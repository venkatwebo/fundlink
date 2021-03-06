<nav class="pcoded-navbar icon-colored">
    <div class="navbar-wrapper">
        <div class="navbar-brand header-logo">
            <a href="./index.html" class="b-brand">
                <div class="b-bg">
                    <i class="feather icon-trending-up"></i>
                </div>
                <span class="b-title"><?php echo siteInfo('name'); ?></span>
            </a>
            <a class="mobile-menu" id="mobile-collapse" href="javascript:"><span></span></a>
        </div>
        <div class="navbar-content scroll-div ps ps--active-y">
            <ul class="nav pcoded-inner-navbar">
                <li class="nav-item pcoded-menu-caption">
                    <label>Navigation</label>
                </li>
                <li data-username="dashboard Default Ecommerce CRM Analytics Crypto Project" class="nav-item">
                    <a href="./index.html" class="nav-link"><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                </li>
                <li class="nav-item pcoded-menu-caption">
                    <label>CMS MANAGEMENT</label>
                </li>


                <li data-username="Menu levels Menu level 2.1 Menu level 2.2" class="nav-item pcoded-hasmenu">
                    <a href="javascript:" class="nav-link"><span class="pcoded-micon"><i class="feather icon-menu"></i></span><span class="pcoded-mtext">Manage Pages</span></a>
                    <ul class="pcoded-submenu">
                        <li class=""><a href="#" class="">About Us</a></li>
                        <li class=""><a href="#" class="">Contact</a></li>
                        <li class="pcoded-hasmenu">
                            <a href="javascript:" class="">Other Links</a>
                            <ul class="pcoded-submenu">
                                <li class=""><a href="#" class="">Privacy Policy</a></li>
                                <li class=""><a href="#" class="">Terms & Conditions</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li data-username="Sample Page" class="nav-item">
                    <a href="<?php echo base_url('cms/list'); ?>" class="nav-link">
                        <span class="pcoded-micon">
                            <i class="feather icon-sidebar"></i>
                        </span>
                        <span class="pcoded-mtext">CMS Pages</span>
                    </a>
                </li>


                <?php /* ?>
                <li data-username="Menu levels Menu level 2.1 Menu level 2.2" class="nav-item pcoded-hasmenu">
                    <a href="javascript:" class="nav-link"><span class="pcoded-micon"><i class="feather icon-menu"></i></span><span class="pcoded-mtext">Menu levels</span></a>
                    <ul class="pcoded-submenu">
                        <li class=""><a href="#" class="">Menu Level 2.1</a></li>
                        <li class="pcoded-hasmenu">
                            <a href="javascript:" class="">Menu level 2.2</a>
                            <ul class="pcoded-submenu">
                                <li class=""><a href="#" class="">Menu level 3.1</a></li>
                                <li class=""><a href="#" class="">Menu level 3.2</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li data-username="Disabled Menu" class="nav-item disabled"><a href="javascript:" class="nav-link"><span class="pcoded-micon"><i class="feather icon-power"></i></span><span class="pcoded-mtext">Disabled menu</span></a></li>
                <li data-username="Sample Page" class="nav-item active"><a href="#" class="nav-link"><span class="pcoded-micon"><i class="feather icon-sidebar"></i></span><span class="pcoded-mtext">Sample page</span></a></li>
                <li class="nav-item pcoded-menu-caption"><label>Support</label></li>
                <li data-username="Documentation" class="nav-item"><a href="./docs.html" class="nav-link" target="_blank"><span class="pcoded-micon"><i class="feather icon-book"></i></span><span class="pcoded-mtext">Documentation</span></a></li>
                <li data-username="Need Support" class="nav-item"><a href="https://codedthemes.support-hub.io/" class="nav-link" target="_blank"><span class="pcoded-micon"><i class="feather icon-help-circle"></i></span><span class="pcoded-mtext">Need support ?</span></a></li>
                <?php */ ?>
            </ul>
        </div>
    </div>
</nav>