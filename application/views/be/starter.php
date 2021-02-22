<!DOCTYPE html>
<html lang="en">

<?php $this->load->view(backendViewFolder() . 'al/head', $data = [], FALSE); ?>

<body>
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->

    <!-- [ navigation menu ] start -->
    <?php $this->load->view(backendViewFolder() . 'al/navigation', $data = [], FALSE); ?>
    <!-- [ navigation menu ] end -->

    <!-- [ Header ] start -->
    <?php $this->load->view(backendViewFolder() . 'al/header', $data = [], FALSE); ?>
    <!-- [ Header ] end -->

    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <?php /* ?>
                    <!-- [ breadcrumb ] start -->
                    <div class="page-header">
                        <div class="page-block">
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <div class="page-header-title">
                                        <h5 class="m-b-10">Sample Page</h5>
                                    </div>
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="./index.html"><i class="feather icon-home"></i></a></li>
                                        <li class="breadcrumb-item"><a href="javascript:">Sample Page</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- [ breadcrumb ] end -->
                    <?php */ ?>

                    <div class="main-body">
                        <div class="page-wrapper">
                            <!-- [ Main Content ] start -->
                            <!-- [ sample-page ] start -->
                            <?php if (isset($page) && $page != "" && file_exists(APPPATH . "views/" . backendViewFolder() . "body-pages/" . $page . ".php") === TRUE) {
                                $this->load->view(backendViewFolder() . 'body-pages/' . $page, $data, FALSE);
                            } else {
                                echo "<h1 class=\"text-center\">PAGE NOT FOUND</h1>";
                            } ?>
                            <!-- [ sample-page ] end -->
                            <!-- [ Main Content ] end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->

    <!-- Warning Section Starts -->
    <!-- Older IE warning message -->
    <!--[if lt IE 11]>
        <div class="ie-warning">
            <h1>Warning!!</h1>
            <p>You are using an outdated version of Internet Explorer, please upgrade
               <br />to any of the following web browsers to access this website.
            </p>
            <div class="iew-container">
                <ul class="iew-download">
                    <li>
                        <a href="http://www.google.com/chrome/">
                            <img src="<?php echo scriptimages(); ?>browser/chrome.png" alt="Chrome" />
                            <div>Chrome</div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.mozilla.org/en-US/firefox/new/">
                            <img src="<?php echo scriptimages(); ?>browser/firefox.png" alt="Firefox" />
                            <div>Firefox</div>
                        </a>
                    </li>
                    <li>
                        <a href="http://www.opera.com">
                            <img src="<?php echo scriptimages(); ?>browser/opera.png" alt="Opera" />
                            <div>Opera</div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.apple.com/safari/">
                            <img src="<?php echo scriptimages(); ?>browser/safari.png" alt="Safari" />
                            <div>Safari</div>
                        </a>
                    </li>
                    <li>
                        <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                            <img src="<?php echo scriptimages(); ?>browser/ie.png" alt="" />
                            <div>IE (11 & above)</div>
                        </a>
                    </li>
                </ul>
            </div>
            <p>Sorry for the inconvenience!</p>
        </div>
    <![endif]-->
    <!-- Warning Section Ends -->

    <!-- Required Js -->
    <?php $this->load->view(backendViewFolder() . 'al/script', $data = [], FALSE); ?>

</body>

</html>