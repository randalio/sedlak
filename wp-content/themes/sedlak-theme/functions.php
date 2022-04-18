<?php
//wp_set_password( 'password', 1 );

if ( ! function_exists( 'ggc_setup' ) ) :
  /**
   * Sets up theme defaults and registers support for various WordPress features.
   *
   * Note that this function is hooked into the after_setup_theme hook, which
   * runs before the init hook. The init hook is too late for some features, such
   * as indicating support for post thumbnails.
   */
  function ggc_setup() {

    // Set Theme Image Sizes
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'grid-one-item', 1200 );
    add_image_size( 'grid-two-items', 700, 275, true );
    add_image_size( 'grid-three-items', 480, 320, true );
    add_image_size( 'grid-four-items', 360, 240, true );
    add_image_size( 'resource-image', 250, 334, true );
    add_image_size( 'ex-large', 1600, 1600 );
    add_image_size( 'slide-background', 1300, 415 );
    add_image_size( 'video-cover', 640, 320, true );
    add_image_size( 'case-study-cover', 480, 220, true );
    add_image_size( 'cover-small', 480, 270, true );
    add_image_size( 'event-cover', 360, 190, true );
    add_image_size( 'team-grid', 360, 360, true );
    add_image_size( 'logo', 260, 150 );



    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on Twenty Nineteen, use a find and replace
     * to change 'twentynineteen' to the name of your theme in all the template files.
     */
    //load_theme_textdomain( 'twentynineteen', get_template_directory() . '/languages' );

    // Add default posts and comments RSS feed links to head.
    // add_theme_support( 'automatic-feed-links' );

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support( 'title-tag' );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support(
      'html5',
      array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
      )
    );

    add_theme_support( 'menus' );
    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );
    // Add support for Block Styles.
    add_theme_support( 'wp-block-styles' );
    // Add support for full and wide align images.
    add_theme_support( 'align-wide' );
    // Add support for editor styles.
    add_theme_support( 'editor-styles' );
    // Enqueue editor styles.
    add_editor_style( 'style-editor.css' );
    // Add support for responsive embedded content.
    add_theme_support( 'responsive-embeds' );
  }
endif;
add_action( 'after_setup_theme', 'ggc_setup' );



// Load CSS
function ggc_css() {
  wp_enqueue_style('ggc_bootstrap_css', get_template_directory_uri() . '/css/bootstrap.min.css');

  wp_enqueue_style('ggc_animate_css', get_template_directory_uri() . '/css/animate.min.css');
  wp_enqueue_style('plyr', '//cdn.plyr.io/3.6.8/plyr.css');
  wp_enqueue_style('owl_carousel_default', get_template_directory_uri() . '/css/owl.theme.default.css');
  wp_enqueue_style('owl_carousel', get_template_directory_uri() . '/css/owl.carousel.css');
  wp_enqueue_style('ggc_style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'ggc_css');

function ggc_add_google_fonts() {
  wp_enqueue_style('ggc_google_fonts_arimo', '//fonts.googleapis.com/css2?family=Arimo:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap', false);
}
add_action( 'wp_enqueue_scripts', 'ggc_add_google_fonts' );


// Load JavaScript Front End
function ggc_javascript() {
  wp_enqueue_script('ggc_bootstrap_js', get_template_directory_uri() . '/js/bootstrap.bundle.min.js', array('jquery'), '4.1', true);
  if (is_singular() && comments_open()) {wp_enqueue_script('comment-reply');}
  //wp_enqueue_script('hoverintent', get_template_directory_uri() . '/js/jquery.hoverIntent.min.js', array('jquery'), '1.0', true);
  wp_enqueue_script('plyr', '//cdn.plyr.io/3.6.8/plyr.js', array('jquery'), '1.0', true);
  wp_enqueue_script('isotope', '//unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js', array('jquery'), '1.0', true);
  wp_enqueue_script('owl_carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), '1.0', true);
  wp_enqueue_script('ggc_script', get_template_directory_uri() . '/js/ggcscript.js', array('jquery'), '1.0', true);
  wp_enqueue_script('ggc_fontawesome', '//kit.fontawesome.com/68220f7b7d.js');
}
add_action('wp_enqueue_scripts', 'ggc_javascript');

// Load JavaScript Admin
function add_styles_to_admin(){
    wp_enqueue_script('ggc_fontawesome', '//kit.fontawesome.com/68220f7b7d.js');
    wp_enqueue_style('ggc_admin', get_template_directory_uri() . '/css/admin.css');
}
add_action( 'admin_enqueue_scripts', 'add_styles_to_admin' );

//CHANGE "POST" to "BLOG"
function ggc_change_post_label() {
  global $menu;
  global $submenu;
  $menu[5][0] = 'Blog';
  $submenu['edit.php'][5][0] = 'Blog';
  $submenu['edit.php'][10][0] = 'Add Blog';
  $submenu['edit.php'][16][0] = 'Tags';
}
function ggc_change_post_object() {
  global $wp_post_types;
  $labels = &$wp_post_types['post']->labels;
  $labels->name = 'Blog';
  $labels->singular_name = 'Blog';
  $labels->add_new = 'Add Blog';
  $labels->add_new_item = 'Add Blog';
  $labels->edit_item = 'Edit Blog';
  $labels->new_item = 'Blog';
  $labels->view_item = 'View Blog';
  $labels->search_items = 'Search Blog';
  $labels->not_found = 'No Blogs found';
  $labels->not_found_in_trash = 'No Blogs found in Trash';
  $labels->all_items = 'All Blog';
  $labels->menu_name = 'Blog';
  $labels->name_admin_bar = 'Blog';
}
add_action( 'admin_menu', 'ggc_change_post_label' );
add_action( 'init', 'ggc_change_post_object' );


//REGISTER CUSTOM POST TYPES
function ggc_create_custom_post_type() {

  register_post_type( 'video',
    array(
      'label' => 'Videos',
      'publicly_queryable' => true,
      'show_ui' => true,
      'show_in_menu' => true,
      'menu_icon' => 'dashicons-video',
      'public' => true,
      'show_in_nav_menus' => true,
      'has_archive' => true,
      'supports' => array('title'),
      // 'taxonomies' => array( 'category' ),
      'rewrite' => array(
        'slug' => 'videos',
      ),
      'exclude_from_search' => false
    )
  );

  register_post_type( 'case-study',
    array(
      'label' => 'Success Stories',
      'publicly_queryable' => true,
      'show_ui' => true,
      'show_in_menu' => true,
      'menu_icon' => 'dashicons-case-study',
      'public' => true,
      'show_in_nav_menus' => true,
      'has_archive' => false,
      'supports' => array( 'title', 'editor', 'revisions' ),
      // 'taxonomies' => array( 'category' ),
      'rewrite' => array(
        'slug' => '/success-stories',
      ),
      'exclude_from_search' => false
    )
  );

  register_post_type( 'white-paper',
    array(
      'label' => 'White Papers',
      'publicly_queryable' => true,
      'show_ui' => true,
      'show_in_menu' => true,
      'menu_icon' => 'dashicons-white-paper',
      'public' => true,
      'show_in_nav_menus' => true,
      'has_archive' => true,
      'supports' => array( 'title', 'editor', 'revisions' ),
      // 'taxonomies' => array( 'category' ),
      'rewrite' => array(
        'slug' => 'white-papers',
      ),
      'exclude_from_search' => false
    )
  );

  register_post_type( 'saved_layout',
    array(
      'label' => 'Saved Layouts',
      'publicly_queryable' => true,
      'show_ui' => true,
      'show_in_menu' => true,
      'menu_icon' => 'dashicons-saved_layout',
      'public' => true,
      'show_in_nav_menus' => false,
      'has_archive' => false,
      'exclude_from_search' => true,
      'supports' => array( 'title', 'editor', 'revisions' ),
    )
  );

  register_post_type( 'testimonial',
    array(
      'label' => 'Testimonials',
      'publicly_queryable' => true,
      'show_ui' => true,
      'show_in_menu' => true,
      'menu_icon' => 'dashicons-testimonial',
      'public' => true,
      'show_in_nav_menus' => false,
      'has_archive' => false,
      'exclude_from_search' => true,
    )
  );

  register_post_type( 'industry',
    array(
      'label' => 'Industries',
      'publicly_queryable' => true,
      'show_ui' => true,
      'show_in_menu' => true,
      'menu_icon' => 'dashicons-industry',
      'public' => true,
      'show_in_nav_menus' => true,
      'has_archive' => false,
      'supports' => array( 'title', 'editor', 'revisions' ),
      'rewrite' => array(
        'slug' => 'industries',
      ),
      'exclude_from_search' => false
    )
  );

  register_post_type( 'service',
    array(
      'label' => 'Services',
      'publicly_queryable' => true,
      'show_ui' => true,
      'show_in_menu' => true,
      'menu_icon' => 'dashicons-service',
      'public' => true,
      'show_in_nav_menus' => true,
      'has_archive' => false,
      'supports' => array( 'title', 'editor', 'revisions' ),
      'rewrite' => array(
        'slug' => 'services',
      ),
      'exclude_from_search' => false
    )
  );

  register_post_type( 'profile',
    array(
      'label' => 'Staff Profiles',
      'publicly_queryable' => true,
      'show_ui' => true,
      'show_in_menu' => true,
      'menu_icon' => 'dashicons-profile',
      'public' => true,
      'show_in_nav_menus' => true,
      'has_archive' => true,
      'supports' => array( 'title', 'editor', 'revisions' ),
      'rewrite' => array(
        'slug' => 'profiles',
      ),
      'exclude_from_search' => false
    )
  );

  register_post_type( 'partner',
    array(
      'label' => 'Partners',
      'publicly_queryable' => true,
      'show_ui' => true,
      'show_in_menu' => true,
      'menu_icon' => 'dashicons-partner',
      'public' => true,
      'show_in_nav_menus' => true,
      'has_archive' => false,
      'supports' => array( 'title', 'editor', 'revisions' ),
      'taxonomies' => array( 'partner_category' ),
      'rewrite' => array(
        'slug' => 'partners',
      ),
      'exclude_from_search' => true
    )
  );
  register_post_type( 'client',
    array(
      'label' => 'Clients',
      'publicly_queryable' => true,
      'show_ui' => true,
      'show_in_menu' => true,
      'menu_icon' => 'dashicons-client',
      'public' => true,
      'show_in_nav_menus' => true,
      'has_archive' => false,
      'supports' => array( 'title', 'editor', 'revisions' ),
      'rewrite' => array(
        'slug' => 'clients',
      ),
      'exclude_from_search' => true
    )
  );

  register_post_type( 'event',
    array(
      'label' => 'Events',
      'publicly_queryable' => true,
      'show_ui' => true,
      'show_in_menu' => true,
      'menu_icon' => 'dashicons-events',
      'public' => true,
      'show_in_nav_menus' => false,
      'has_archive' => false,
      'exclude_from_search' => true,
    )
  );




  // 
  // register_post_type( 'redirect_301',
  //   array(
  //     'label' => '301 Redirects',
  //     'publicly_queryable' => true,
  //     'show_ui' => true,
  //     'show_in_menu' => true,
  //     'menu_icon' => 'dashicons-three_ohh_one',
  //     'public' => true,
  //     'show_in_nav_menus' => false,
  //     'has_archive' => false,
  //     'exclude_from_search' => true,
  //     'supports' => '',
  //   )
  // );




}
add_action( 'init', 'ggc_create_custom_post_type', 1 );



// Add Video Taxonomy
function sed_partner_taxonomy_init() {
  register_taxonomy(
    'partner_category',
    'partner_categories',
    array(
      'label' => __( 'Partner Categories' ),
      'rewrite' => array( 'slug' => 'partner-categories' ),
      'hierarchical' => true
    )
  );
}
add_action( 'init', 'sed_partner_taxonomy_init', 0 );



//HIDE EDITOR
add_action( 'init', function() {
  //remove_post_type_support( 'post', 'editor' );
  //remove_post_type_support( 'page', 'editor' );
}, 99);

// Set Custom Menu Order for WordPress Admin Menu
function ggc_custom_menu_order($menu_ord) {
  if (!$menu_ord) return true;
  return array(
    'index.php', // Dashboard
    'separator1', // First separator
    'edit.php', // Blog Posts
    'edit.php?post_type=page', // Pages
    'nestedpages', // Pages
    'edit.php?post_type=industry', // Industry
    'edit.php?post_type=service', // Services
    //
    'edit.php?post_type=video', // Videos
    'edit.php?post_type=case-study', // Case Studies
    'edit.php?post_type=white-paper', // White Papers
    'edit.php?post_type=testimonial', // Testimonials
    'edit.php?post_type=client', // Clients
    'edit.php?post_type=partner', // Partners
    'edit.php?post_type=profile', // Profiles
    'edit.php?post_type=event', // Events
    'separator2', // Second separator
    'edit.php?post_type=saved_layout', // Saved Layout
    'theme-general-settings', // Theme Settings / Header & Footer Settings
    'themes.php', // Appearance
    'plugins.php', // Plugins
    'users.php', // Users
    'edit-comments.php', // Comments
    'upload.php', // Media
    'tools.php', // Tools
    'options-general.php', // Settings
    'separator3', // Third separator
    'edit.php?post_type=acf-field-group', // Advanced Custom Fields Pro
    'wpmudev', // WPMU DEV
    'wp-defender', // Defender Pro
    'all-in-one-seo-pack', // All in One SEO
    'separator-last', // Last separator
  );
}
add_filter('custom_menu_order', 'ggc_custom_menu_order'); // Activate custom_menu_order
add_filter('menu_order', 'ggc_custom_menu_order');

// Create ACF Options Page for General Theme Options as well as the Header & Footer
if( function_exists('acf_add_options_page') ) {
  acf_add_options_page(array(
    'page_title'  => 'Theme General Settings',
    'menu_title'  => 'Theme Settings',
    'menu_slug'   => 'theme-general-settings',
    'capability'  => 'edit_posts',
    'redirect'    => false
  ));
  acf_add_options_sub_page(array(
    'page_title'  => 'Header &amp; Footer Settings',
    'menu_title'  => 'Header &amp; Footer',
    'parent_slug' => 'theme-general-settings',
  ));

}

// REGISTER ACF FIELDS FOR OPTIONS PAGES
include_once('includes/option_fields.php');

// REGISTER ACF FIELDS FOR CUSTOM POST TYPES
require_once('includes/cpt_fields.php');

function marion_register_nav_menu(){
  register_nav_menus( array(
    'primary'   => __('Primary Menu', 'marion_theme'),
    'top_right' => __('Top Right Menu', 'marion_theme'),
    'footer_nav' => __('Footer Nav', 'marion_theme'),
  ));
}
add_action( 'after_setup_theme', 'marion_register_nav_menu', 0 );

// Register Bootstrap 4 Nav Walker
require_once('includes/class-wp-bootstrap-navwalker.php');

//REMOVE BASIC CUSTOM FIELDS FROM WP EDITOR - SPEEDS UP ADMIN EDIT PAGE
add_filter('acf/settings/remove_wp_meta_box', '__return_true');


// END EXCERPT WITH SSECONDSENTENCE
add_filter('get_the_excerpt', 'end_with_sentence');

function end_with_sentence( $excerpt ) {
  $allowed_ends = array('.', '!', '?', '...');
  $number_sentences = 2;
  $excerpt_chunk = $excerpt;

  for($i = 0; $i < $number_sentences; $i++){
      $lowest_sentence_end[$i] = 100000000000000000;
      foreach( $allowed_ends as $allowed_end)
      {
        $sentence_end = strpos( $excerpt_chunk, $allowed_end);
        if($sentence_end !== false && $sentence_end < $lowest_sentence_end[$i]){
            $lowest_sentence_end[$i] = $sentence_end + strlen( $allowed_end );
        }
        $sentence_end = false;
      }

      $sentences[$i] = substr( $excerpt_chunk, 0, $lowest_sentence_end[$i]);
      $excerpt_chunk = substr( $excerpt_chunk, $lowest_sentence_end[$i]);
  }

  return implode('', $sentences);
}



add_filter( 'gform_confirmation', function ( $confirmation, $form, $entry, $ajax ) {
    GFCommon::log_debug( __METHOD__ . '(): running.' );

    $forms = array( 4 ); // Target forms with id 3, 6 and 7. Change this to fit your needs.

    if ( ! in_array( $form['id'], $forms ) ) {
        return $confirmation;
    }

    if ( isset( $confirmation['redirect'] ) ) {
        $url          = esc_url_raw( $confirmation['redirect'] );
        GFCommon::log_debug( __METHOD__ . '(): Redirect to URL: ' . $url );
        $pdf = get_field('pdf');
        $confirmation = 'Thank you for your interst in '.get_the_title().'.<br/>
                        </br/>Your White Paper should open in a new window.<br/>
                        </br/>You can also <a href="'.$pdf['url'].'" download>Click here</a> to download your white paper.';
        $confirmation .= "<script type=\"text/javascript\">window.open('$url', '_blank');</script>";
    }

    return $confirmation;
}, 10, 4 );

if ( function_exists( 'add_theme_support' ) ) {

    add_theme_support( 'post-thumbnails' ); // This should be in your theme. But we add this here because this way we can have featured images before swicth to a theme that supports them.

    function easy_add_thumbnail($post) {

        $already_has_thumb = has_post_thumbnail();
        $post_type = get_post_type( $post->ID );
        $exclude_types = array('');
        $exclude_types = apply_filters( 'eat_exclude_types', $exclude_types );

        // do nothing if the post has already a featured image set
        if ( $already_has_thumb ) {
            return;
        }

        // do the job if the post is not from an excluded type
        if ( ! in_array( $post_type, $exclude_types ) ) {
            // get first attached image
            $attached_image = get_children( "order=ASC&post_parent=$post->ID&post_type=attachment&post_mime_type=image&numberposts=1" );

            if ( $attached_image ) {
                $attachment_values = array_values( $attached_image );
                // add attachment ID
                add_post_meta( $post->ID, '_thumbnail_id', $attachment_values[0]->ID, true );
            }
        }
    }

    // set featured image before post is displayed (for old posts)
    add_action('the_post', 'easy_add_thumbnail');

    // hooks added to set the thumbnail when publishing too
    add_action('new_to_publish', 'easy_add_thumbnail');
    add_action('draft_to_publish', 'easy_add_thumbnail');
    add_action('pending_to_publish', 'easy_add_thumbnail');
    add_action('future_to_publish', 'easy_add_thumbnail');
}



// function ggc_301_redirects(){
//
//   $redirects = get_posts(
//     array(
//       'post_type' => 'redirect_301',
//       'numberposts' => -1,
//       'fields'    => 'ids,'
//     )
//   );
//   //print_r($redirects );
//
//   $redirect_targets = array();
//   foreach( $redirects as $redirect ){
//     $old = get_field('starting_url', $redirect);
//     if(substr($old, -1) != '/') {
//         $old = $old.'/'; //substr($old, 0, -1);
//     }
//     $new = get_field('destination_url', $redirect);
//     if(substr($new, -1) == '/') {
//         $new = $new.'/'; //substr($new, 0, -1);
//     }
//     $redirect_targets[ $old ] = $new;
//   }
//
//   // print_r($redirect_targets );
//   //
//   //
//   // $redirect_targets = array(
//   //   '/old-url1' => '/new-url1',
//   //   '/old-url2' => '/new-url2',
//   //   '/old-url3' => '/new-url3',
//   // );
//
//   if ( (isset($redirect_targets[ $_SERVER['REQUEST_URI'] ] ) ) && (php_sapi_name() != "cli") ) {
//     header('HTTP/1.0 301 Moved Permanently');
//     header('Location: https://'. $_SERVER['HTTP_HOST'] . $redirect_targets[ $_SERVER['REQUEST_URI'] ]);
//
//     if (extension_loaded('newrelic')) {
//       newrelic_name_transaction("redirect");
//     }
//     exit();
//   }
// }
// add_action( 'init', 'ggc_301_redirects' );


?>
