<?php
/*
Plugin Name: GGC BLōX
Plugin URI: https://www.ggcomm.com
description: Content BLōX by GGC
Version: 1.0
Author: GGC
Author URI: https://www.ggcomm.com
License: GPL2
*/

if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if( ! class_exists('GGCBLOX') ) :

// error_log(json_encode(class_exists('GGCBLOX')));
// error_log("class_exists('GGCBLOX')");

class GGCBLOX {
  private static $instance;
  public $ggc_blox_new_blocks;
  protected $blox_db_version;
  protected $table_name;
  protected $enabled = array();
  protected $all_blocks;
  protected $global_content_blocks;
  protected $whitelist = array(
    '127.0.0.1',
    '::1'
  );

  /** @var array Storage for class instances */
  var $instances = array();

  public static $initialize_ran = false;
  public static $custom_subfields_ran = false;
  public static $register_options_pages_ran = false;
  public static $init_blox_settings_page_ran = false;

  /*
  *  __construct
  *
  *  A dummy constructor to ensure GGCBLOX is only initialized once
  *
  *  @type  function
  *  @date  23/06/12
  *  @since 5.0.0
  *
  *  @param N/A
  *  @return  N/A
  */

  function __construct() {

    /* Do nothing here */

  }


  /*
  *  initialize
  *
  *  The real constructor to initialize GGCBLOX
  *
  *  @type  function
  */

  function initialize(){
    global $wpdb;
    $this->blox_db_version = '1.0.0';
    $this->table_name = $wpdb->prefix . 'blox_options_pages';
    $this->enabled = array();
    $this->all_blocks = array();

    $table_name = $this->table_name;

    //add_action('admin_notices', array($this, 'acf_required_notice'), 10, 0);

    include plugin_dir_path( __FILE__ ) . 'content-blocks/add_fields.php';

    add_action('acf/init', array($this, 'blox_build_custom_subfields_wrapper'), 9999, 0);

    // INCLUDE CONTENT STYLES - Enqueues styles for content blocks
    include plugin_dir_path( __FILE__ ) . 'content-blocks/blox-styles.php';
    include plugin_dir_path( __FILE__ ) . 'content-blocks/search.php';

    //INCLUDE CONTENT BLOCKS
    function blox_content() {
      return include plugin_dir_path( __FILE__ ) . 'content-blocks/content-blocks.php';
    }

    add_action('acf/init', array($this, 'register_options_pages_wrapper'), 10, 0);
    add_action('acf/init', array($this, 'init_blox_settings_page_wrapper'), 10, 0);
    add_image_size( 'general-cta', 800);
    add_image_size( 'ex-large', 1600, 1200, true );
    add_image_size( 'two-col-list-img', 950, 460, true );

    register_activation_hook(__FILE__, array($this, 'blox_create_db'));

    $this->blox_check_for_update();

    add_action( 'admin_menu', function () {
      global $submenu;
      if ( isset( $submenu[ 'themes.php' ] ) ) {
        foreach ( $submenu[ 'themes.php' ] as $index => $menu_item ) {
          if ( in_array( array( 'Customize', 'Customizer', 'customize' ), $menu_item )) {
            unset( $submenu[ 'themes.php' ][ $index ] );
          }
        }
      }
    });

  }

  /*
  *  blox_add_to_options_page
  *
  *  Add content blocks to ACF options page
  *
  *  @type  function
  *  @date  9/25/19
  *  @since 1.0.0
  *
  *  @param N/A
  *  @return N/A
  */
  public function blox_add_to_options_page($options_page_slug = '', $options_page_title = '') {
    global $wpdb;
    $this->table_name = $wpdb->prefix . 'blox_options_pages';

    $options_slug_value = (string) $options_page_slug;
    $row_exists = $wpdb->get_row( "SELECT * FROM $this->table_name WHERE options_slug = '$options_slug_value'" );
    if($row_exists == null){
      $wpdb->insert($this->table_name, array(
        'options_slug' => (string) $options_page_slug,
        'options_title' => (string) $options_page_title,
      ));
    }
  }

  /*
  *  blox_check_for_update
  *
  *  Check for update
  *
  *  @hook register_activation_hook
  *
  *  @type  function
  *  @date  9/25/19
  *  @since 1.0.0
  *
  *  @param N/A
  *  @return N/A
  */
  function blox_check_for_update() {
    global $wpdb;
    $plugin_version = $this->blox_db_version;
    $db_version = get_option( 'blox_db_version', '1.0.0' );
    if (version_compare($db_version, (string)$plugin_version) < 0) {
      update_option('blox_db_version', $this->blox_db_version);
    }
  }

  /*
  *  blox_create_db
  *
  *  Create database table
  *
  *  @hook register_activation_hook
  *
  *  @type  function
  *  @date  9/25/19
  *  @since 1.0.0
  *
  *  @param N/A
  *  @return N/A
  */
  function blox_create_db() {
    error_log('BLOX CREATE DB');
    global $wpdb;
    $table_name = $this->table_name;
    $charset_collate = $wpdb->get_charset_collate();
    error_log('TABLE NAME VARIABLE');
    error_log($table_name);
    $sql = "CREATE TABLE $table_name (
      options_slug varchar(191) NOT NULL,
      options_title varchar(191) NOT NULL,
      PRIMARY KEY  (options_slug)
    ) $charset_collate;";
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
    add_option('blox_db_version', $this->blox_db_version );
  }

  /*
  *  register_options_pages
  *
  *  Add settings page
  *
  *  @calling_action acf/init
  *
  *  @type  function
  *  @date  9/25/19
  *  @since 1.0.0
  *
  *  @param N/A
  *  @return N/A
  */
  function register_options_pages(){
    if(function_exists('acf_add_options_page')) {
      acf_add_options_page(array(
        'page_title'  => 'GGC BLōX Settings',
        'menu_title'  => 'Blōx Settings',
        'menu_slug'   => 'ggc_blox_settings',
        'capability'  => 'edit_posts',
        'redirect'    => false
      ));
    }
  }

  /*
  *  init_blox_settings_page
  *
  *  Create blox plugin settings page
  *
  *  @calling_action acf/init
  *
  *  @type  function
  *  @date  9/25/19
  *  @since 1.0.0
  *
  *  @param N/A
  *  @return N/A
  */
  function init_blox_settings_page(){
    global $wpdb;
    $table_name = $this->table_name;

    if( function_exists('acf_add_local_field_group') ):
      acf_add_local_field_group(array(
        'key' => 'group_5c9qrfa9asv6cae91casdfg09',
        'title' => 'Enable Blocks',
        'fields' => array(),
        'location' => array(
          array(
            array(
              'param' => 'options_page',
              'operator' => '==',
              'value' => 'ggc_blox_settings',
            ),
          ),
        ),
      ));

      $post_types = get_post_types( array('public' => true), 'names', 'and');
      $options_page_table = $wpdb->get_results("SELECT * FROM " . $table_name, ARRAY_A);
      $page_choices = array();

      foreach( $post_types as $post_type):
        $post_name = str_replace("_", " ", $post_type);
        $post_name = ucwords($post_name);
        $page_choices[$post_type] = $post_name;
      endforeach;

      foreach( $options_page_table as $options_page):
        $options_page_name = str_replace("-", "_", $options_page['options_slug']);
        $page_choices[$options_page_name] = $options_page['options_title'];
      endforeach;

      $block_directories = glob(plugin_dir_path(__FILE__).'content-blocks' . '/*' , GLOB_ONLYDIR);

      foreach($block_directories as $dir):
        $path = $dir;
        $basename = basename($path);
        $basename = str_replace('-', '_', $basename);
        $blocklabel = str_replace('_', ' ', $basename);
        $blocklabel = ucwords($blocklabel);
        $this->all_blocks['name'][] = $basename;
        $this->all_blocks['title'][] = $blocklabel;
      endforeach;

      $theme_dir = get_template_directory() . '/ggc_blox/';
      $custom_block_directories = glob($theme_dir. 'blocks' . '/*' , GLOB_ONLYDIR);

      foreach($custom_block_directories as $dir):
        $path = $dir;
        $basename = basename($path);
        $basename = str_replace('-', '_', $basename);
        $blocklabel = str_replace('_', ' ', $basename);
        $blocklabel = ucwords($blocklabel);
        $this->all_blocks['name'][] = $basename;
        $this->all_blocks['title'][] = $blocklabel;
      endforeach;

      $i = 0;

      while( $i < sizeof($this->all_blocks['name']) ):
        $name = $this->all_blocks['name'][$i];
        $title = $this->all_blocks['title'][$i];

        acf_add_local_field(array(
          'key' => 'enable_'.$name,
          'label' => $title,
          'name' => 'field_'.$name,
          'type' => 'checkbox',
          'choices' => $page_choices,
          'layout' => 'vertical',
          'wrapper' => array(
            'width' => '70',
            'class' => '',
            'id' => '',
          ),
          'allow_custom' => false,
          'save_custom' => false,
          'toggle' => false,
          'return_format' => 'value',
          'parent' => 'group_5c9qrfa9asv6cae91casdfg09'
        ));

        acf_add_local_field(array(
          'key' => 'content_location_'.$name,
          'label' => 'Make Available For:',
          'name' => 'field_content_location_'.$name,
          'type' => 'checkbox',
          'choices' => array(
            'main' => 'Main Content',
            'sidebar' => 'Sidebar Content',
          ),
          'layout' => 'vertical',
          'wrapper' => array(
            'width' => '30',
            'class' => '',
            'id' => '',
          ),
          'allow_custom' => false,
          'save_custom' => false,
          'toggle' => false,
          'return_format' => 'value',
          'parent' => 'group_5c9qrfa9asv6cae91casdfg09'
        ));

        $i++;
      endwhile;

    endif;
  }

  /*
  *  blox_build_custom_subfields
  *
  *  notes
  *
  *  @calling_action acf/init
  *
  *  @type  function
  *  @date  9/25/19
  *  @since 1.0.0
  *
  *  @param N/A
  *  @return N/A
  */
  function blox_build_custom_subfields(){
    // if(is_admin()){
    //   return;
    // }
    $default_blox = $this->blox_build_default_fields();
    $layouts_sidebar = array();
    if( !is_array($default_blox) ){
      $default_blox = array();
    }

    foreach($default_blox as $key_pt => $blocks_pages):
      $layouts = array();
      $location = $blocks_pages['type'];
      if($blocks_pages['type'] === 'options_page'){
        $key_pt = str_replace("_", "-", $key_pt);
        $key_pt = 'acf-options-' . $key_pt;
      }
      else {
        $key_pt = $key_pt;
      }
      foreach($blocks_pages as $block_key => $block):
        $blox_key_underscore = str_replace('-', '_', $block_key);
        if( isset($block['layout']) ):
          $layouts[$blox_key_underscore] = $block['layout'];
        endif;
        if( isset($block['layout_sidebar']) ):
          $layouts_sidebar[$blox_key_underscore] = $block['layout_sidebar'];
        endif;
      endforeach;
      blox_init_fields($key_pt, $layouts, $layouts_sidebar, $location);
    endforeach;
  }

  /*
  *  acf_required_notice
  *
  *  notes
  *
  *  @calling_action admin_notices
  *
  *  @type  function
  *  @date  9/25/19
  *  @since 1.0.0
  *
  *  @param N/A
  *  @return N/A
  */
  // function acf_required_notice(){
  //   // ACF PRO: IMAGE CROP ADD ON
  //   // if(file_exists( plugin_dir_path( __DIR__ ) .'acf-image-crop-add-on/acf-image-crop.php')) {
  //   //   if(!is_plugin_active( 'acf-image-crop-add-on/acf-image-crop.php')) {
  //   //     echo '<div class="notice notice-error"><p>GGC BLōX: ACF: Image Crop Add On is not active!</p></div>';
  //   //   }
  //   // }
  //   // else {
  //   //   echo '<div class="notice notice-error"><p>GGC BLōX: ACF: Image Crop Add On is not installed! Plugin won\'t with without it. </p></div>';
  //   // }
  //   // GRAVITY FORMS
  //   // if(file_exists( plugin_dir_path( __DIR__ ) .'gravityforms/gravityforms.php')) {
  //   //   if(!is_plugin_active( 'gravityforms/gravityforms.php')) {
  //   //     echo '<div class="notice notice-error"><p>GGC BLōX: Gravity Forms is not Active</p></div>';
  //   //   }
  //   // }
  //   // else {
  //   //   echo '<div class="notice notice-error"><p>GGC BLōX: Gravity Forms is not installed!</p></div>';
  //   // }
  //   // ACF: GRAVITY FORMS ADD ON
  //   // if(file_exists( plugin_dir_path( __DIR__ ) .'acf-gravityforms-add-on/acf-gravityforms-add-on.php')) {
  //   //   if(!is_plugin_active( 'acf-gravityforms-add-on/acf-gravityforms-add-on.php')) {
  //   //     echo '<div class="notice notice-error"><p>GGC BLōX: ACF: Gravity Forms Add On is not Active </p></div>';
  //   //   }
  //   // }
  //   // else {
  //   //   echo '<div class="notice notice-error"><p>GGC BLōX: ACF: Gravity Forms Add On is not installed!</p></div>';
  //   // }
  // }

  /*
  *  blox_find_all_block_directories
  *
  *  notes
  *
  *
  *  @type  function
  *  @date  9/25/19
  *  @since 1.0.0
  *
  *  @param N/A
  *  @return N/A
  */
  function blox_find_all_block_directories($block_directories, $block_pages, $enabled, $block_type){
    foreach($block_directories as $dir):
      $path = $dir;
      $theme_dir = get_template_directory() . '/ggc_blox/';
      $basename = basename($path);
      $basename = str_replace('-', '_', $basename);
      if($block_type === 'default'):
        if( is_file( $theme_dir .'/'. $basename.'/fields.php') ):
          $path = $theme_dir . $basename;
        endif;
        clearstatcache();
        $this->blox_load_hierarchical_block($block_pages, $basename, $path, $enabled);
      endif;
      if($block_type === 'custom'):
        if(file_exists($path.'/fields.php')):
          $this->blox_load_hierarchical_block($block_pages, $basename, $path, $enabled);
        endif;
      endif;
    endforeach;
  }

  /*
  *  blox_load_hierarchical_block
  *
  *  notes
  *
  *
  *  @type  function
  *  @date  9/25/19
  *  @since 1.0.0
  *
  *  @param N/A
  *  @return N/A
  */
  function blox_load_hierarchical_block($block_pages, $basename, $path, $enabled){
    foreach($block_pages as $block_page):
      //error_log(json_encode($block_page));
      $enable_block_array = get_field( 'enable_'.$basename, 'option' );
      //error_log(json_encode($enable_block_array));
      if ( $enable_block_array ):
        //error_log('If enable_block_array');
        foreach ( $enable_block_array as $enabled_post_type ):
          //error_log('foreach enable_block_array');
          if((string)$block_page['slug'] === (string)$enabled_post_type):
            //error_log('If block_page[slug] === enabled_post_type');
            $enabled[$enabled_post_type]['blocks'][] = $basename;
            if( file_exists($path.'/fields.php') ):
              //error_log('If file exists');
              $posttype = (string)$block_page['slug'];
              include $path.'/fields.php';
              if( isset($fields) && sizeof($fields) > 0 ):
                //error_log('If isset(fields) && sizeof(fields)');
                $this->global_content_blocks[$block_page['slug']][$basename]['name'] = $basename;
                $this->global_content_blocks[$block_page['slug']][$basename]['path'] = $path;
                $location = get_field( 'content_location_'.$basename,'option');
                if( in_array( 'main', $location) ):
                  $this->global_content_blocks[$block_page['slug']][$basename]['layout'] = $fields;
                endif;
                if( in_array( 'sidebar', $location) ):
                  $this->global_content_blocks[$block_page['slug']][$basename]['layout_sidebar'] = $fields;
                endif;
                $this->global_content_blocks[$block_page['slug']]['type'] = $block_page['type'];
              endif;
              unset($fields);
              clearstatcache();
            endif;
          endif;
        endforeach;
      endif;
    endforeach;
  }

  /*
  *  blox_build_default_fields
  *
  *  notes
  *
  *
  *  @type  function
  *  @date  9/25/19
  *  @since 1.0.0
  *
  *  @param N/A
  *  @return N/A
  */
  function blox_build_default_fields(){
    global $wpdb;
    $this->table_name = $wpdb->prefix . 'blox_options_pages';
    $theme_dir = get_template_directory() . '/ggc_blox/';
    $current_post_type = get_post_type();
    $content_blocks = array();
    $options_pages = array();
    $block_pages = array();
    $enabled = array();
    $options_page_table = $wpdb->get_results("SELECT * FROM " . $this->table_name, ARRAY_A);
    $post_types = get_post_types(array('public' => true), 'names', 'and');

    foreach($options_page_table as $options_page):
      $options_page_name = str_replace("-", "_", $options_page['options_slug']);
      $block_pages[$options_page_name]['slug'] = $options_page_name;
      $block_pages[$options_page_name]['type'] = 'options_page';
    endforeach;

    foreach($post_types as $post_type_key => $post_type):
      $block_pages[$post_type]['slug'] = $post_type;
      $block_pages[$post_type]['type'] = 'post_type';
    endforeach;

    // DEFAULT BLOCKS
    if( is_dir(  plugin_dir_path(__FILE__).'content-blocks' )  ):
      $block_directories = glob(plugin_dir_path(__FILE__).'content-blocks' . '/*' , GLOB_ONLYDIR);
      $content_block_type = 'default';
      $this->blox_find_all_block_directories($block_directories, $block_pages, $enabled, $content_block_type);
    endif;
    clearstatcache();

    // CUSTOM BLOCKS
    if(is_dir($theme_dir. 'blocks')):
      $block_directories = glob($theme_dir. 'blocks' . '/*' , GLOB_ONLYDIR);
      $content_block_type = 'custom';
      $this->blox_find_all_block_directories($block_directories, $block_pages, $enabled, $content_block_type);
    endif;
    clearstatcache();

    return $this->global_content_blocks;
  }

  /**
  *  get_instance
  *
  *  Returns an instance.
  *
  *  @date  13/2/18
  *  @since 5.6.9
  *
  *  @param string $class The instance class name.
  *  @return  object
  */

  function get_instance( $class ) {
    $name = strtolower($class);
    return isset($this->instances[ $name ]) ? $this->instances[ $name ] : null;
  }

  /**
  *  new_instance
  *
  *  Creates and stores an instance.
  *
  *  @date  13/2/18
  *  @since 5.6.9
  *
  *  @param string $class The instance class name.
  *  @return  object
  */

  function new_instance( $class ) {
    $instance = new $class();
    $name = strtolower($class);
    $this->instances[ $name ] = $instance;
    return $instance;
  }


  public function blox_build_custom_subfields_wrapper() {
    if ( ! self::$custom_subfields_ran ) {
      $this->blox_build_custom_subfields();
    }
    self::$custom_subfields_ran = true;
  }

  public function register_options_pages_wrapper() {
    if ( ! self::$register_options_pages_ran ) {
      $this->register_options_pages();
    }
    self::$register_options_pages_ran = true;
  }

  public function init_blox_settings_page_wrapper() {
    if ( ! self::$init_blox_settings_page_ran ) {
      $this->init_blox_settings_page();
    }
    self::$init_blox_settings_page_ran = true;
  }

  public function initialize_wrapper() {
    if ( ! self::$initialize_ran ) {
      $this->initialize();
    }
    self::$initialize_ran = true;
  }

}

 function render_blocks($row_layout){

    //$row_layout = substr($row_layout, 0, strrpos( $row_layout, '_'));

    $plugin_path = plugin_dir_path(__FILE__);
    $theme_override_path = get_template_directory().'/ggc_blox';
    $theme_blocks_path = get_template_directory().'/ggc_blox/blocks';
    $plugin_blocks_path = plugin_dir_path(__FILE__).'/content-blocks';

    if( file_exists( $theme_blocks_path.'/'.$row_layout.'/'.$row_layout.'.php') ):
      $current_layout = $theme_blocks_path.'/'.$row_layout.'/'.$row_layout.'.php';
    elseif( file_exists( $theme_override_path.'/'.$row_layout.'/'.$row_layout.'.php') ):
      $current_layout = $theme_override_path.'/'.$row_layout.'/'.$row_layout.'.php';
    elseif( file_exists( $plugin_blocks_path.'/'.$row_layout.'/'.$row_layout.'.php') ):
      $current_layout = $plugin_blocks_path.'/'.$row_layout.'/'.$row_layout.'.php';
    else:
      error_log($row_layout.': no template found in theme or plugin');
    endif;


    if( $current_layout != '' ){
      include($current_layout);
    }

  }

/*
*  ggcblox
*
*  notes
*
*
*  @type  function
*  @date  9/25/19
*  @since 1.0.0
*
*  @param N/A
*  @return N/A
*/
function ggcblox() {
  // globals
  global $ggcblox;
  // initialize
  //error_log(json_encode($ggcblox));
  if( isset($ggcblox) !== null) {
    $ggcblox = new GGCBLOX();
    $ggcblox->initialize_wrapper();
  }
  // return
  return $ggcblox;
}

// initialize
ggcblox();

endif; // class_exists check














?>
