<?php
define( 'THEME_URL', get_stylesheet_directory() );
define( 'CORE', THEME_URL . '/core' );

require_once(CORE . '/init.php');

if (isset($content_width)) {
    $content_width = 620;
}

// if (!function_exists(congnguyen_theme_setup)) {
//     function congnguyen_theme_setup() {
//         echo "hello";
//     }
    
//     add_action('init', 'congnguyen_theme_setup');
// }

/**
 * Tao sidebar
 */
$sidebar = array(
    'name' => __('Main Sidebar', 'congnguyen'),
    'id' => 'main-sidebar',
    'description' => 'Main sidebar for CongNguyen theme',
    'class' => 'main-sidebar',
    'before_title' => '<h3 class="widgettitle">',
    'after_title' => '</h3>'
  );
  register_sidebar($sidebar);

/**
@ Thiết lập hàm hiển thị logo
@ logo()
**/
if (! function_exists('logo')) {
    function logo() {?>
      <div class="logo">
        <div class="site-name">
          <?php if (is_home()) {
            printf(
              '<h1><a href="%1$s" title="%2$s">%3$s</a></h1>',
              get_bloginfo('url'),
              get_bloginfo('description'),
              get_bloginfo('sitename')
            );
          } else {
            printf(
              '<p><a href="%1$s" title="%2$s">%3$s</a></p>',
              get_bloginfo('url'),
              get_bloginfo('description'),
              get_bloginfo('sitename')
            );
          } // endif ?>
        </div>
        <div class="site-description"><?php bloginfo( 'description' ); ?></div>
   
      </div>
    <?php }
  }

  /*
* Tạo menu cho theme
*/
register_nav_menu ( 'primary-menu', __('Primary Menu11', 'congnguyen') );

/**
@ Thiết lập hàm hiển thị menu
@ menu( $slug )
**/
if (!function_exists('menu')) {
    function menu($slug) {
      $menu = array(
        'theme_location' => $slug,
        'container' => 'nav',
        'container_class' => $slug,
      );
      wp_nav_menu($menu);
    }
  }

/**
 * Tao ham phan trang pagination
 */
if (!function_exists('pagination')) {
    function pagination() {
        // if ($GLOBALS['wp_query']->max_num_pages < 2) {
        //     return '';
        // }
        ?>
 
        <nav class="pagination" role="navigation">
            <?php if ( get_next_post_link() ) : ?>
            <div class="prev"><?php next_posts_link( __('Older Posts', 'congnguyen') ); ?></div>
            <?php endif; ?>
        
            <?php if ( get_previous_post_link() ) : ?>
            <div class="next"><?php previous_posts_link( __('Newer Posts', 'congnguyen') ); ?></div>
            <?php endif; ?>
        
        </nav><?php
    }
}

/**
@ Hàm hiển thị ảnh thumbnail của post.
@ Ảnh thumbnail sẽ không được hiển thị trong trang single
@ Nhưng sẽ hiển thị trong single nếu post đó có format là Image
@ thumbnail( $size )
**/
if ( ! function_exists( 'thumbnail' ) ) {
    function thumbnail( $size ) {
   
      // Chỉ hiển thumbnail với post không có mật khẩu
      if ( ! is_single() &&  has_post_thumbnail()  && ! post_password_required() || has_post_format( 'image' ) ) : ?>
        <figure class="post-thumbnail"><?php the_post_thumbnail( $size ); ?></figure><?php
      endif;
    }
  }

/**
@ Hàm hiển thị tiêu đề của post trong .entry-header
@ Tiêu đề của post sẽ là nằm trong thẻ <h1> ở trang single
@ Còn ở trang chủ và trang lưu trữ, nó sẽ là thẻ <h2>
@ entry_header()
**/
if ( !function_exists( 'entry_header' ) ) {
    function entry_header() {
      if ( is_single() ) : ?>
   
        <h1 class="entry-title">
          <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
            <?php the_title(); ?>
          </a>
        </h1>
      <?php else : ?>
        <h2 class="entry-title">
          <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
            <?php the_title(); ?>
          </a>
        </h2><?php
   
      endif;
    }
  }

  /**
@ Hàm hiển thị thông tin của post (Post Meta)
@ entry_meta()
**/
if( ! function_exists( 'entry_meta' ) ) {
    function entry_meta() {
        if ( ! is_page() ) :
        echo '<div class="entry-meta">';

            // Hiển thị tên tác giả, tên category và ngày tháng đăng bài
            printf( __('<span class="author">Posted by %1$s</span>', 'congnguyen'),
            get_the_author() );

            printf( __('<span class="date-published"> at %1$s</span>', 'congnguyen'),
            get_the_date() );

            printf( __('<span class="category"> in %1$s</span>', 'congnguyen'),
            get_the_category_list( ', ' ) );

            // Hiển thị số đếm lượt bình luận
            // if ( comments_open() ) :
            // echo ' <span class="meta-reply">';
            //     comments_popup_link(
            //     __('Leave a comment', 'congnguyen'),
            //     __('One comment', 'congnguyen'),
            //     __('% comments', 'congnguyen'),
            //     __('Read all comments', 'congnguyen')
            //     );
            // echo '</span>';
            // endif;
        echo '</div>';
        endif;
    }
}

/*
 * Thêm chữ Read More vào excerpt
 */
function readmore() {
    return '...<a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('Read More', 'congnguyen') . '</a>';
  }
  add_filter( 'excerpt_more', 'readmore' );
   
  /**
  @ Hàm hiển thị nội dung của post type
  @ Hàm này sẽ hiển thị đoạn rút gọn của post ngoài trang chủ (the_excerpt)
  @ Nhưng nó sẽ hiển thị toàn bộ nội dung của post ở trang single (the_content)
  @ entry_content()
  **/
  if ( ! function_exists( 'entry_content' ) ) {
    function entry_content() {
   
      if ( ! is_single() ) :
        the_excerpt();
      else :
        the_content();
   
        /*
         * Code hiển thị phân trang trong post type
         */
        // $link_pages = array(
        //   'before' => __('<p>Page:', 'congnguyen'),
        //   'after' => '</p>',
        //   'nextpagelink'     => __( 'Next page', 'congnguyen' ),
        //   'previouspagelink' => __( 'Previous page', 'congnguyen' )
        // );
        // wp_link_pages( $link_pages );
      endif;
   
    }
  }

/**
@ Hàm hiển thị tag của post
@ entry_tag()
**/
if ( ! function_exists( 'entry_tag' ) ) {
    function entry_tag() {
      if ( has_tag() ) :
        echo '<div class="entry-tag">';
        printf( __('Tagged in %1$s', 'congnguyen'), get_the_tag_list( '', ', ' ) );
        echo '</div>';
      endif;
    }
  }

function styles() {
/*
* Hàm get_stylesheet_uri() sẽ trả về giá trị dẫn đến file style.css của theme
* Nếu sử dụng child theme, thì file style.css này vẫn load ra từ theme mẹ
*/
    wp_register_style( 'main-style', get_template_directory_uri() . '/style.css', 'all' );
    wp_enqueue_style( 'main-style' );
    }
add_action( 'wp_enqueue_scripts', 'styles' );
?>