<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FABIA</title>
    <link rel="stylesheet" href="<?php get_template_directory_uri() . '/css/mystyle.css' ; ?>">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <?php wp_head(); ?>
</head>
<body>
    <header>        
        <h1><a href="<?php echo bloginfo('wpurl'); ?>"><?php echo bloginfo('name'); ?></a></h1>
        <h3><?php echo bloginfo('description'); ?></h3>
    </header>