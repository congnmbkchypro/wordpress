<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

  <!-- Bootstrap -->
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
  <title>FABIA</title>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <header>
    <div class="header__top">
      <div class="container">
        <div class="header__logo">
          <img src="<?php echo get_template_directory_uri() ?>/img/fabulous_logo.svg">
        </div>
      </div>
    </div>  
    <div class="clear"></div>
    <div class="header__banner">
      <div class="header__bottom"></div>
    </div>
  </header>            