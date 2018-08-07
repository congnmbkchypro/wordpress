<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fashionate
 */
	$custom_logo_id = get_theme_mod( 'custom_logo' );


?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if (is_singular() and pings_open()): ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php endif; ?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'fashionate' ); ?></a>
	<header class="bg">

		<nav class="navbar navbar-default top-bg" style="
		<?php 
			$image = get_header_image();
			if ($image):?>

				background-image:url(<?php echo $image; ?>);
		<?php endif;?>
		">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse" aria-expanded="false">
						<span class="sr-only"><?php esc_html_e('Toggle navigation', 'fashionate');?></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
      						<?php if ( $custom_logo_id ) : ?>
        							<a  class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo('name'); ?>"><img class="site-logo" src="<?php echo wp_get_attachment_image_url( $custom_logo_id , 'full' ); ?>" alt="<?php bloginfo('name'); ?>" /></a>
        						<?php else : ?>

        							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
        							<p class="site-description"><?php bloginfo( 'description' ); ?></p>
        					<?php endif; ?> 

				</div>

				<div class="collapse navbar-collapse navbar-responsive-collapse ">

					<?php
					$tx_facebook_url = get_theme_mod('tx_facebook');
					$tx_twitter_url =  get_theme_mod('tx_twitter');
					$tx_google_url = get_theme_mod('tx_google');
					$tx_linked_url = get_theme_mod('tx_linkedin');;

					?>

					<ul class="navbar-right social-menu top-social-link" >
						<?php if($tx_facebook_url): ?>
						<li><a target="_blank" href="<?php echo esc_url ( $tx_facebook_url);?>"><i class="fa fa-lg fa-facebook"></i></a></li>
						<?php endif; ?>
						<?php if($tx_twitter_url): ?>
						<li><a target="_blank" href="<?php echo esc_url ( $tx_twitter_url);?>"><i class="fa fa-lg fa-twitter"></i></a></li>
						<?php endif; ?>
						<?php if($tx_google_url): ?>
						<li><a target="_blank" href="<?php echo esc_url ( $tx_google_url);?>"><i class="fa fa-lg fa-google-plus"></i></a></li>
						<?php endif; ?>
						<?php if($tx_linked_url): ?>
						<li><a target="_blank" href="<?php echo esc_url ( $tx_linked_url);?>"><i class="fa fa-lg fa-linkedin"></i></a></li>
						<?php endif; ?>
					</ul>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<?php wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'menu_class' => 'nav navbar-nav navbar-left cus-nav ',
						'fallback_cb' => '__return_false', 
						'menu' => 'primary',
						'menu_id' => 'main-menu',
						'depth' => 0,
						'walker' => new BootstrapNavMenuWalker()
					)
				); ?>


				</div>


			</div><!-- /.container-fluid -->


		</nav>



	</header>

	<div id="content" class="site-content">
