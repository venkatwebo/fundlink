<head>
  <title><?php echo siteInfo($type = "name");
          echo (isset($page_title) && $page_title != "") ? " | " . $page_title : ""; ?></title>
  <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 10]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
  <!-- Meta -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description" content="<?php echo siteInfo($type = 'description'); ?>" />
  <meta name="keywords" content="<?php echo siteInfo($type = 'keywords'); ?>" />
  <meta name="author" content="<?php echo siteInfo($type = 'author'); ?>" />


  <!-- Favicon icon -->
  <link rel="icon" href="<?php echo scriptimages(); ?>favicon.ico" type="image/x-icon" />
  <!-- fontawesome icon -->
  <link rel="stylesheet" href="<?php echo scriptfonts(); ?>fontawesome/css/fontawesome-all.min.css" />
  <!-- animation css -->
  <link rel="stylesheet" href="<?php echo scriptplugins(); ?>animation/css/animate.min.css" />
  <!-- Notification css -->
  <link href="<?php echo scriptplugins('notification/css/notification.min.css'); ?>" rel="stylesheet">
  <!-- modal-window-effects css -->
  <link rel="stylesheet" href="<?php echo scriptplugins("modal-window-effects/css/md-modal.css") ?>" />
  <!-- data tables css -->
  <link rel="stylesheet" href="<?php echo scriptplugins('data-tables/css/datatables.min.css'); ?>" />
  <!-- vendor css -->
  <link rel="stylesheet" href="<?php echo scriptcss(); ?>style.css" />

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>