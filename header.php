<!doctype html>
<!--[if lt IE 7]>     <html class="no-js lt-ie10 lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>        <html class="no-js lt-ie10 lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>      <html class="no-js lt-ie10 lt-ie9" lang="en"> <![endif]-->
<!--[if IE 9]>      <html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!-->  <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <!-- Meta -->
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <?php echo(is_search()) ? '<meta name="robots" content="noindex, nofollow" />' : ''; ?>
  <title><?php wp_title( '|', true, 'right' ); ?></title>
  <meta name="title" content="<?php wp_title( '|', true, 'right' ); ?>">
  <meta name="google-site-verification" content="">
  <meta charset="utf-8" />
  <meta name="Copyright" content="<?php echo ' Copyright' . bloginfo('name') . '. All Rights Reserved.';?>">
  <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no" />
  <!-- CSS -->
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/main.css" type="text/css">
  <!-- WP Head -->
  <?php wp_head(); ?>
</head>
<body class='<?php body_class(); ?>'>
  <div class='container'>
    <header class='main-header'>
      <h1 class='main-title'>
        <a href='<?php bloginfo("url"); ?>'>
          <?php bloginfo("title"); ?>
        </a>
      </h1>
      <h3 class='info-link'>
        <a href='<?php echo get_permalink(4); ?>' class='nav'>
          info
        </a>
      </h3>
      <div class='clear'></div>
    </header>